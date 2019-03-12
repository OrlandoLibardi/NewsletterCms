<?php

namespace OrlandoLibardi\NewsletterCms\app\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewsletterNotification extends Notification
{
    use Queueable;

    protected $confirm_link;
    protected $template;
    protected $subject;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($confirm_link, $template, $subject)
    {
        $this->confirm_link = $confirm_link;
        $this->template = $template;
        $this->subject = $subject;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                ->subject($this->subject)
                ->view( $this->template,
                [
                    'notifiable' => $notifiable,
                    'confirm_link' => $this->confirm_link
                ]);            
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
            //
        ];
    }
}
