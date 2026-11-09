<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ContactEnquiry extends Mailable
{
    public function __construct(public readonly array $enquiry) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            replyTo: [new Address($this->enquiry['email'], $this->enquiry['name'])],
            subject: 'Website enquiry: '.config('contact.types')[$this->enquiry['enquiry_type']],
        );
    }

    public function content(): Content
    {
        return new Content(view: 'mail.contact-enquiry');
    }
}
