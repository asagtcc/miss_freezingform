<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class FreezingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address("noreply@tryoncall.com", $this->data->name),
            subject: 'Membership Freezing ('.($this->data->branch_id == 1 ? 'Hessa Al Mubarak' : ($this->data->branch_id == 2 ? 'SABAH AL-SALEM' : 'MANGAF')).')',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'freezing',
            with: [
                'name' => $this->data->name,
                'phone' => $this->data->phone,
                'email' => $this->data->email,
                'start_date' => $this->data->date_from,
                'end_date' => $this->data->date_to,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
