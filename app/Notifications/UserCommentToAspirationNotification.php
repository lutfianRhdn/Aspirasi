<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserCommentToAspirationNotification extends Notification
{
    use Queueable;
    public $message;
    public $user, $aspiration;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message, $user, $aspiration)
    {
        $this->message = $message;
        $this->user = $user;
        $this->aspiration = $aspiration;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [

            'message' => $this->message,
            'user_id' => $this->user->id,
            'aspiration_id' => $this->aspiration
        ];
    }
}
