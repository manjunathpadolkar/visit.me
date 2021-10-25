<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailMessage extends Notification
{
    use Queueable;
    private $sendMessageData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sendMessageData)
    {
        $this->sendMessageData = $sendMessageData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->line($this->sendMessageData['body'])
                    ->action($this->sendMessageData['sendMessageText'],
                     $this->sendMessageData['url'],
                     $this->sendMessageData['visitorFirstName'],
                     $this->sendMessageData['visitorLastName'],
                     $this->sendMessageData['visitorEmail'],
                     )
                    ->line($this->sendMessageData['thankyou']);
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
            'message' => $this->sendMessageData['sendMessageText'],
            'visitorFirstName' => $this->sendMessageData['visitorFirstName'],
            'visitorLastName' => $this->sendMessageData['visitorLastName'],
            'visitorEmail' => $this->sendMessageData['visitorEmail'],
        ];
    }
}
