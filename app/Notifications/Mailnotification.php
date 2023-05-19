<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Mailnotification extends Notification
{
    use Queueable;

    private $mail_id;
    private $user_created;
    private $text;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user_created,$text,$mail_id)
    {
        $this -> mail_id    = $mail_id;
        $this->user_created = $user_created;
        $this -> text = $text;
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


    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }


    public function toArray($notifiable)
    {
        return [
            'message' => 'Hello, ' . $notifiable->name . ' ! You have a new massage from',

            'mail_id'       => $this    -> mail_id,
            'user_created'   =>$this     -> user_created,
            'text'         =>$this     ->text
        ];
    }
}
