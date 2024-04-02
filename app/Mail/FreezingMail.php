<?php

namespace App\Mail;

use App\Models\Branch;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;

class FreezingMail extends Mailable
{
    use Queueable;
    use SerializesModels;

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
        $branch = Branch::find($this->data->branch_id);

        return new Envelope(
            from: new Address('noreply@tryoncall.com', $this->data->name),
            subject: 'Membership Freezing (' . $branch->branch_name . ')'
            // subject: 'Membership Freezing'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.freezing',
            with: [
                'name' => $this->data->name,
                'phone' => $this->data->phone,
                'email' => $this->data->email,
                'start_date' => $this->data->date_from,
                'end_date' => $this->data->date_to,
                'message' => $this,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            // Attachment::fromPath(asset('assets/images/dark-logo.png')),
            // Attachment::fromPath(asset('assets/images/logoicon.png')),
        ];
    }
}
