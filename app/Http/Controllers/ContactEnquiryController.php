<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\SendContactEnquiryRequest;
use App\Mail\ContactAcknowledgement;
use App\Mail\ContactEnquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class ContactEnquiryController extends Controller
{
    public function __invoke(SendContactEnquiryRequest $request): RedirectResponse
    {
        $enquiry = $request->safe()->only(['name', 'email', 'phone', 'enquiry_type', 'message']);
        $recipients = config('contact.recipients');

        if ($recipients === [] || collect($recipients)->contains(fn ($email) => ! is_string($email) || ! filter_var($email, FILTER_VALIDATE_EMAIL))) {
            Log::error('Contact enquiry delivery is unavailable: recipient configuration is invalid.');

            return $this->deliveryFailed($enquiry);
        }

        try {
            Mail::mailer('smtp')->to($recipients)->send(new ContactEnquiry($enquiry));
        } catch (TransportExceptionInterface $exception) {
            // SMTP errors can contain credentials, message data or recipient addresses.
            Log::warning('Contact enquiry SMTP delivery failed.', ['exception_type' => $exception::class]);

            return $this->deliveryFailed($enquiry);
        }

        $response = redirect()->to(route('contact').'#contact-enquiry')
            ->with('contact_success', 'Your enquiry has been sent to our team. This is not a confirmed booking.');

        try {
            Mail::mailer('smtp')->to($enquiry['email'])->send(new ContactAcknowledgement);
        } catch (TransportExceptionInterface $exception) {
            Log::warning('Contact acknowledgement SMTP delivery failed.', ['exception_type' => $exception::class]);

            return $response->with('contact_notice', 'Your enquiry reached our team, but we could not confirm sending your acknowledgement email. You do not need to submit your enquiry again.');
        }

        return $response;
    }

    private function deliveryFailed(array $enquiry): RedirectResponse
    {
        return redirect()->to(route('contact').'#contact-enquiry')
            ->withInput($enquiry)
            ->withErrors(['delivery' => 'We could not confirm that your enquiry was sent. Please try again, call us, or use email or WhatsApp. Retrying may send a duplicate.']);
    }
}
