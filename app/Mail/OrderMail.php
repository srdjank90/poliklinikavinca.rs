<?php

namespace App\Mail;

use App\Models\OrderProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $theme;
    public $orderProducts;
    public $pdvPrice;
    /**
     * Create a new message instance.
     */
    public function __construct($order, $orderProducts, $pdvPrice)
    {
        $this->order = $order;
        $this->theme = getOption('theme_active_opt', 'lika');
        $this->orderProducts  = $orderProducts;
        $this->pdvPrice = $pdvPrice;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('Porudžbina sa sajta Zlatni Standard'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'frontend.themes.' . $this->theme . '.emails.order',
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
