<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PackageCheckoutNotification extends Notification
{
    use Queueable;

    protected $package;
    protected $email;
    protected $phone;
    /**
     * Create a new notification instance.
     */
    public function __construct($package, $email, $phone)
    {
        $this->package = $package;
        $this->phone = $phone;
        $this->email = $email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Narudžbina investicionog paketa')
            ->greeting(' ')
            ->line('Paket ID: ' . $this->package->id)
            ->line('Paket: ' . $this->package->name)
            ->line('Cena: ' . $this->package->price . ' dinara')
            ->line('Email: ' . $this->email)
            ->line('Phone: ' . $this->phone)
            ->salutation(' ');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
