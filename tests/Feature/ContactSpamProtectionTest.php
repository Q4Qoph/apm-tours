<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Mail\ContactAcknowledgement;
use App\Mail\ContactEnquiry;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Component\Mailer\Exception\TransportException;
use Tests\TestCase;

class ContactSpamProtectionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'contact.recipients' => ['reservations@apmtours.com'],
            'contact.turnstile.enabled' => true,
            'contact.turnstile.site_key' => 'test-public-key',
            'contact.turnstile.secret_key' => 'test-private-key',
            'mail.from.address' => 'reservations@apmtours.com',
            'mail.from.name' => 'A&PM Tours & Travel',
        ]);
    }

    public function test_widget_displays_public_key_and_action_without_exposing_the_secret(): void
    {
        $this->get('/contact')->assertOk()
            ->assertSee('data-sitekey="test-public-key"', false)
            ->assertSee('data-action="contact_enquiry"', false)
            ->assertSee('https://challenges.cloudflare.com/turnstile/v0/api.js', false)
            ->assertDontSee('test-private-key');
    }

    public function test_missing_token_blocks_both_messages_without_a_provider_call(): void
    {
        Mail::fake();
        Http::preventStrayRequests();
        $input = $this->enquiry();
        unset($input['cf-turnstile-response']);

        $this->post('/contact', $input)->assertSessionHasErrors([
            'cf-turnstile-response' => 'Please complete the bot verification before sending your enquiry.',
        ]);

        Mail::assertNothingSent();
        Http::assertNothingSent();
    }

    public function test_valid_challenge_is_verified_before_staff_and_visitor_email(): void
    {
        Mail::fake();
        $this->validProvider();

        $this->post('/contact', $this->enquiry())->assertSessionHasNoErrors()->assertSessionHas('contact_success');

        Http::assertSent(fn ($request) => $request->url() === 'https://challenges.cloudflare.com/turnstile/v0/siteverify'
            && $request['secret'] === 'test-private-key' && $request['response'] === 'test-token');
        Mail::assertSent(ContactEnquiry::class, fn ($mail) => $mail->hasTo('reservations@apmtours.com') && count($mail->to) === 1);
        Mail::assertSent(ContactAcknowledgement::class, fn ($mail) => $mail->hasTo('traveller@example.com'));
    }

    #[DataProvider('invalidProviderResults')]
    public function test_invalid_challenge_results_block_email(array $result): void
    {
        Mail::fake();
        Http::preventStrayRequests();
        Http::fake(['https://challenges.cloudflare.com/turnstile/v0/siteverify' => Http::response($result)]);

        $this->post('/contact', $this->enquiry())->assertSessionHasErrors('cf-turnstile-response');

        Mail::assertNothingSent();
    }

    public static function invalidProviderResults(): array
    {
        return [
            'forged token' => [['success' => false]],
            'expired or duplicate token' => [['success' => false, 'error-codes' => ['timeout-or-duplicate']]],
            'wrong hostname' => [['success' => true, 'hostname' => 'attacker.example', 'action' => 'contact_enquiry']],
            'wrong action' => [['success' => true, 'hostname' => 'localhost', 'action' => 'login']],
            'missing fields' => [['success' => true]],
            'wrong success type' => [['success' => 'true', 'hostname' => 'localhost', 'action' => 'contact_enquiry']],
        ];
    }

    public function test_provider_connection_failure_fails_closed(): void
    {
        Mail::fake();
        Http::preventStrayRequests();
        Http::fake(['https://challenges.cloudflare.com/turnstile/v0/siteverify' => Http::failedConnection()]);

        $this->post('/contact', $this->enquiry())->assertSessionHasErrors('cf-turnstile-response')->assertSessionMissing('contact_success');

        Mail::assertNothingSent();
    }

    public function test_provider_server_error_fails_closed_even_with_success_in_the_body(): void
    {
        Mail::fake();
        Http::preventStrayRequests();
        Http::fake(['https://challenges.cloudflare.com/turnstile/v0/siteverify' => Http::response([
            'success' => true, 'hostname' => 'localhost', 'action' => 'contact_enquiry',
        ], 503)]);

        $this->post('/contact', $this->enquiry())->assertSessionHasErrors('cf-turnstile-response');

        Mail::assertNothingSent();
    }

    public function test_missing_secret_disables_submission_and_server_rejects_a_forged_token(): void
    {
        config(['contact.turnstile.secret_key' => null]);
        Mail::fake();
        Http::preventStrayRequests();

        $this->get('/contact')->assertSee('Verification is temporarily unavailable.')->assertSee('disabled', false);
        $this->post('/contact', $this->enquiry())->assertSessionHasErrors('cf-turnstile-response');

        Http::assertNothingSent();
        Mail::assertNothingSent();
    }

    public function test_invalid_form_data_does_not_consume_a_challenge_token(): void
    {
        Mail::fake();
        Http::preventStrayRequests();

        $this->post('/contact', array_replace($this->enquiry(), ['email' => 'invalid']))->assertSessionHasErrors('email');

        Http::assertNothingSent();
        Mail::assertNothingSent();
    }

    public function test_replayed_token_is_rejected_even_if_the_provider_temporarily_accepts_it_again(): void
    {
        Mail::fake();
        $this->validProvider();

        $this->post('/contact', $this->enquiry())->assertSessionHasNoErrors();
        $this->post('/contact', array_replace($this->enquiry(), ['message' => 'A different message using the same token.']))
            ->assertSessionHasErrors('cf-turnstile-response');

        Mail::assertSentCount(2);
    }

    public function test_duplicate_enquiry_with_a_new_challenge_sends_no_additional_email(): void
    {
        Mail::fake();
        $this->validProvider();

        $this->post('/contact', $this->enquiry())->assertSessionHasNoErrors();
        $this->post('/contact', array_replace($this->enquiry(), ['cf-turnstile-response' => 'new-token']))
            ->assertSessionHasErrors('duplicate');

        Mail::assertSentCount(2);
    }

    public function test_email_limit_survives_changing_ip_addresses_and_acknowledgement_is_limited(): void
    {
        Mail::fake();
        $this->validProvider();

        for ($attempt = 1; $attempt <= 3; $attempt++) {
            $this->withServerVariables(['REMOTE_ADDR' => '192.0.2.'.$attempt])
                ->post('/contact', array_replace($this->enquiry(), [
                    'message' => 'A distinct travel enquiry number '.$attempt.'.',
                    'cf-turnstile-response' => 'unique-token-'.$attempt,
                ]))->assertSessionHasNoErrors();
        }

        $this->withServerVariables(['REMOTE_ADDR' => '192.0.2.4'])
            ->post('/contact', array_replace($this->enquiry(), ['email' => 'TRAVELLER@example.com']))
            ->assertStatus(429)->assertHeader('Retry-After');

        Mail::assertSent(ContactEnquiry::class, 3);
        Mail::assertSent(ContactAcknowledgement::class, 1);
    }

    public function test_hourly_ip_limit_blocks_slow_requests_with_different_emails(): void
    {
        Mail::fake();
        Http::preventStrayRequests();
        $this->freezeTime();

        for ($attempt = 0; $attempt < 20; $attempt++) {
            $this->post('/contact', [])->assertSessionHasErrors('name');
            $this->travel(2)->minutes();
        }

        $this->post('/contact', $this->enquiry())->assertStatus(429)->assertHeader('Retry-After');

        Mail::assertNothingSent();
        Http::assertNothingSent();
    }

    public function test_production_rejects_loopback_hostname_even_with_a_successful_provider_response(): void
    {
        Mail::fake();
        Http::preventStrayRequests();
        $this->app['env'] = 'production';
        $session = $this->app['session']->driver();
        $session->start();
        $this->post('/contact', $this->enquiry() + ['_token' => $session->token()])->assertSessionHasErrors('cf-turnstile-response');

        Http::assertNothingSent();
        Mail::assertNothingSent();
    }

    public function test_staff_delivery_failure_releases_duplicate_guard_for_a_legitimate_retry(): void
    {
        $this->validProvider();
        Mail::shouldReceive('mailer')->once()->with('smtp')->andThrow(new TransportException('Simulated failure'));
        Mail::shouldReceive('getDefaultDriver')->andReturn('smtp');
        $this->post('/contact', $this->enquiry())->assertSessionHasErrors('delivery');
        $this->withCookie(config('session.cookie'), session()->getId())->get('/contact')->assertOk();
        Mail::fake();

        $this->post('/contact', array_replace($this->enquiry(), ['cf-turnstile-response' => 'retry-token']))
            ->assertSessionHasNoErrors()->assertSessionHas('contact_success');

        Mail::assertSentCount(2);
    }

    public function test_rate_limits_distinguish_visitors_behind_a_trusted_cloudflare_proxy(): void
    {
        Mail::fake();
        Http::preventStrayRequests();
        $this->withServerVariables(['REMOTE_ADDR' => '173.245.48.1']);
        $this->withHeader('X-Forwarded-For', '192.0.2.10');
        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->post('/contact', [])->assertSessionHasErrors('name');
        }
        $this->post('/contact', [])->assertStatus(429);
        $this->withHeader('X-Forwarded-For', '192.0.2.11')->post('/contact', [])->assertStatus(302);
        Mail::assertNothingSent();
    }

    public function test_direct_callers_cannot_evade_limits_with_forged_forwarded_headers(): void
    {
        Mail::fake();
        Http::preventStrayRequests();
        $this->withServerVariables(['REMOTE_ADDR' => '192.0.2.50']);
        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->withHeader('X-Forwarded-For', '198.51.100.'.($attempt + 1))->post('/contact', [])->assertSessionHasErrors('name');
        }
        $this->withHeader('X-Forwarded-For', '198.51.100.100')->post('/contact', [])->assertStatus(429);
        Mail::assertNothingSent();
    }

    private function validProvider(): void
    {
        Http::preventStrayRequests();
        Http::fake(['https://challenges.cloudflare.com/turnstile/v0/siteverify' => Http::response([
            'success' => true, 'hostname' => 'localhost', 'action' => 'contact_enquiry',
        ])]);
    }

    private function enquiry(): array
    {
        return [
            'name' => 'Test Traveller',
            'email' => 'traveller@example.com',
            'enquiry_type' => 'general',
            'message' => 'We would like help planning a family trip.',
            'cf-turnstile-response' => 'test-token',
        ];
    }
}
