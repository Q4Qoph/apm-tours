<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ContactAcknowledgement extends Mailable
{
    public function envelope(): Envelope
    {
        $sender = new Address(config('mail.from.address'), config('mail.from.name'));

        return new Envelope(
            from: $sender,
            replyTo: [$sender],
            subject: 'We have received your enquiry | A&PM Tours & Travel',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.contact-acknowledgement',
            text: 'mail.contact-acknowledgement-text',
        );
    }
}
