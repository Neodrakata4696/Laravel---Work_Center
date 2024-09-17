<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\work_center;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Str;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewWork extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public work_center $work_center)
    {
        //
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
                    ->subject("New Work from {$this->work_center->user->name}")
                    ->greeting("New Work from {$this->work_center->user->name}")
                    ->line(Str::limit($this->work_center->message, 50))
                    ->action('Go To Work', url('/'))
                    ->line('Thank you for using our application!');
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
