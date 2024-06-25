<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Salon;
use App\Models\GalleryImage;

class ImageDeletedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $salon;
    public $image;

    /**
     * Create a new message instance.
     *
     * @param Salon $salon
     * @param GalleryImage $image
     */
    public function __construct(Salon$salon, GalleryImage $image)
    {
        $this->salon = $salon;
        $this->image = $image;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Image Deleted Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.image-deleted-notification',
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
