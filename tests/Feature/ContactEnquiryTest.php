<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Mail\ContactAcknowledgement;
use App\Mail\ContactEnquiry;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\PendingMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Mockery;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Component\Mailer\Exception\TransportException;
use Tests\TestCase;

class ContactEnquiryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'contact.recipients' => ['reservations@apmtours.com'],
            'contact.turnstile.enabled' => false,
            'mail.from.address' => 'reservations@apmtours.com',
            'mail.from.name' => 'A&PM Tours & Travel',
        ]);
    }

    public function test_contact_renders_a_local_labeled_form_without_demo_ajax(): void
    {
        $response = $this->get('/contact');
        $response->assertOk()
            ->assertSee('action="'.route('contact.send').'"', false)
            ->assertSee('name="_token"', false)
            ->assertSee('for="enquiry-name"', false)
            ->assertSee('href="'.route('privacy').'"', false)
            ->assertSee('class="contact-form style2 apm-enquiry-form"', false)
            ->assertSee('name="website"', false)
            ->assertDontSee('Book a tour');
    }

    public function test_valid_enquiry_is_sent_only_to_reservations_with_fixed_sender_and_visitor_reply_to(): void
    {
        Mail::fake();

        $this->post('/contact', $this->enquiry() + ['to' => 'attacker@example.com', 'from' => 'attacker@example.com'])
            ->assertRedirect(route('contact').'#contact-enquiry')
            ->assertSessionHas('contact_success')
            ->assertSessionHasNoErrors();

        Mail::assertSent(ContactEnquiry::class, function (ContactEnquiry $mail): bool {
            $mail->render();

            return $mail->hasTo('reservations@apmtours.com')
                && count($mail->to) === 1
                && ! $mail->hasTo('apmtourske@gmail.com')
                && ! $mail->hasTo('j.nyabuti.85@gmail.com')
                && $mail->hasFrom('reservations@apmtours.com')
                && $mail->hasReplyTo('traveller@example.com')
                && $mail->subject === 'Website enquiry: Safari & holiday planning'
                && $mail->mailer === 'smtp'
                && ! array_key_exists('to', $mail->enquiry);
        });
    }

    public function test_phone_can_be_omitted(): void
    {
        Mail::fake();
        $enquiry = $this->enquiry();
        unset($enquiry['phone']);

        $this->post('/contact', $enquiry)->assertSessionHasNoErrors();

        Mail::assertSent(ContactEnquiry::class, fn (ContactEnquiry $mail) => ! isset($mail->enquiry['phone']));
    }

    public function test_required_fields_are_rejected_and_no_mail_is_sent(): void
    {
        Mail::fake();

        $this->from('/contact')->post('/contact', [])
            ->assertRedirect(route('contact'))
            ->assertSessionHasErrors(['name', 'email', 'enquiry_type', 'message']);

        Mail::assertNothingSent();
    }

    #[DataProvider('invalidFields')]
    public function test_invalid_fields_are_rejected_without_sending_mail(string $field, mixed $value): void
    {
        Mail::fake();

        $this->post('/contact', array_replace($this->enquiry(), [$field => $value]))
            ->assertSessionHasErrors($field)
            ->assertSessionMissing('contact_success');

        if (is_array($value)) {
            $this->withCookie(config('session.cookie'), session()->getId())->get('/contact')->assertOk();
        }

        Mail::assertNothingSent();
    }

    public static function invalidFields(): array
    {
        return [
            'name too long' => ['name', str_repeat('a', 121)],
            'name is an array' => ['name', ['invalid']],
            'name header injection' => ['name', "Traveller\r\nBcc: attacker@example.com"],
            'email invalid' => ['email', 'not-an-email'],
            'email too long' => ['email', str_repeat('a', 245).'@example.com'],
            'email header injection' => ['email', "traveller@example.com\r\nBcc: attacker@example.com"],
            'phone too long' => ['phone', str_repeat('1', 41)],
            'phone is an array' => ['phone', ['invalid']],
            'type unknown' => ['enquiry_type', 'instant-booking'],
            'type is an array' => ['enquiry_type', ['safari']],
            'message too short' => ['message', 'Short'],
            'message too long' => ['message', str_repeat('a', 5001)],
            'message is an array' => ['message', ['invalid']],
            'honeypot filled' => ['website', 'https://spam.example'],
        ];
    }

    public function test_validation_errors_are_linked_and_input_is_preserved_and_escaped(): void
    {
        Mail::fake();
        $enquiry = array_replace($this->enquiry(), ['name' => '<script>alert(1)</script>', 'email' => 'invalid']);

        $this->post('/contact', $enquiry)->assertSessionHasErrors('email');

        $page = $this->withCookie(config('session.cookie'), session()->getId())->get('/contact');
        $page->assertOk()
            ->assertSee('The email field must be a valid email address.')
            ->assertSee('href="#enquiry-email"', false)
            ->assertSee('aria-invalid="true"', false)
            ->assertSee('&lt;script&gt;alert(1)&lt;/script&gt;', false)
            ->assertDontSee('<script>alert(1)</script>', false);
    }

    public function test_mail_content_escapes_customer_input(): void
    {
        $mail = new ContactEnquiry(array_replace($this->enquiry(), ['message' => '<script>alert("unsafe")</script>']));

        $mail->assertSeeInHtml('<script>alert("unsafe")</script>');
        $mail->assertDontSeeInHtml('<script>alert("unsafe")</script>', false);
        $mail->assertSeeInHtml('This is an enquiry, not a confirmed reservation.');
    }

    public function test_smtp_failure_preserves_input_without_success_or_sensitive_logs(): void
    {
        Mail::shouldReceive('mailer')->once()->with('smtp')
            ->andThrow(new TransportException('SECRET_TOKEN traveller@example.com PRIVATE MESSAGE'));
        Log::spy();

        $this->post('/contact', $this->enquiry())
            ->assertRedirect(route('contact').'#contact-enquiry')
            ->assertSessionHasErrors('delivery')
            ->assertSessionHasInput('message', 'We would like to plan a family safari.')
            ->assertSessionMissing('contact_success');

        Log::shouldHaveReceived('warning')->once()->with(
            'Contact enquiry SMTP delivery failed.',
            ['exception_type' => TransportException::class],
        );
    }

    public function test_missing_or_invalid_recipients_fail_closed(): void
    {
        Mail::fake();
        config(['contact.recipients' => []]);

        $this->post('/contact', $this->enquiry())->assertSessionHasErrors('delivery')->assertSessionMissing('contact_success');
        config(['contact.recipients' => ['invalid']]);
        $this->post('/contact', $this->enquiry())->assertSessionHasErrors('delivery')->assertSessionMissing('contact_success');

        Mail::assertNothingSent();
    }

    public function test_sixth_attempt_is_rate_limited_with_accessible_feedback_and_retry_header(): void
    {
        Mail::fake();

        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->post('/contact', [])->assertSessionHasErrors('name');
        }

        $this->post('/contact', $this->enquiry())
            ->assertStatus(429)
            ->assertHeader('Retry-After')
            ->assertSee('Too many enquiries.')
            ->assertSee('role="alert"', false)
            ->assertSee('value="Test Traveller"', false);

        Mail::assertNothingSent();
    }

    public function test_missing_csrf_token_is_rejected(): void
    {
        Mail::fake();
        $this->app['env'] = 'local';

        $this->post('/contact', $this->enquiry())->assertStatus(419);

        Mail::assertNothingSent();
    }

    public function test_successful_enquiry_sends_a_separate_acknowledgement_only_to_the_visitor(): void
    {
        Mail::fake();

        $this->post('/contact', $this->enquiry())->assertSessionHas('contact_success')->assertSessionMissing('contact_notice');

        Mail::assertSent(ContactAcknowledgement::class, function (ContactAcknowledgement $mail): bool {
            $mail->render();

            return $mail->hasTo('traveller@example.com')
                && count($mail->to) === 1
                && $mail->hasFrom('reservations@apmtours.com')
                && $mail->hasReplyTo('reservations@apmtours.com')
                && $mail->subject === 'We have received your enquiry | A&PM Tours & Travel'
                && $mail->mailer === 'smtp';
        });
        Mail::assertSentCount(2);
    }

    public function test_acknowledgement_contains_no_submitted_message_or_staff_recipient_addresses(): void
    {
        $mail = new ContactAcknowledgement;
        $mail->assertSeeInHtml('This acknowledgement is not a confirmed booking or reservation.');
        $mail->assertSeeInText('This acknowledgement is not a confirmed booking or reservation.');
        $mail->assertDontSeeInHtml('apmtourske@gmail.com');
        $mail->assertDontSeeInHtml('j.nyabuti.85@gmail.com');
        $mail->assertDontSeeInHtml('We would like to plan a family safari.');
    }

    public function test_acknowledgement_failure_keeps_staff_submission_success_and_does_not_invite_resubmission(): void
    {
        $mailer = Mockery::mock(Mailer::class);
        $staffMail = Mockery::mock(PendingMail::class);
        $visitorMail = Mockery::mock(PendingMail::class);
        Mail::shouldReceive('mailer')->twice()->with('smtp')->andReturn($mailer);
        $mailer->shouldReceive('to')->once()->with(['reservations@apmtours.com'])->andReturn($staffMail);
        $staffMail->shouldReceive('send')->once()->with(Mockery::type(ContactEnquiry::class));
        $mailer->shouldReceive('to')->once()->with('traveller@example.com')->andReturn($visitorMail);
        $visitorMail->shouldReceive('send')->once()->with(Mockery::type(ContactAcknowledgement::class))
            ->andThrow(new TransportException('SECRET_TOKEN traveller@example.com'));
        Log::spy();

        $this->post('/contact', $this->enquiry())
            ->assertRedirect(route('contact').'#contact-enquiry')
            ->assertSessionHas('contact_success')
            ->assertSessionHas('contact_notice', 'Your enquiry reached our team, but we could not confirm sending your acknowledgement email. You do not need to submit your enquiry again.')
            ->assertSessionHasNoErrors();

        $this->withCookie(config('session.cookie'), session()->getId())->get('/contact')
            ->assertSee('You do not need to submit your enquiry again.');
        Log::shouldHaveReceived('warning')->once()->with(
            'Contact acknowledgement SMTP delivery failed.',
            ['exception_type' => TransportException::class],
        );
    }

    private function enquiry(): array
    {
        return [
            'name' => 'Test Traveller',
            'email' => 'traveller@example.com',
            'phone' => '+44 (0) 1234 567890',
            'enquiry_type' => 'safari',
            'message' => 'We would like to plan a family safari.',
        ];
    }
}
