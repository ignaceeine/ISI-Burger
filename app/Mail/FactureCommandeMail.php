<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FactureCommandeMail extends Mailable
{
    use Queueable, SerializesModels;
    private string $facturePath;
    /**
     * Create a new message instance.
     */
    public function __construct(string $facturePath)
    {
        $this->facturePath = $facturePath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Facture',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.FactureContent',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->facturePath)
                ->as('factureISIBurger.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
