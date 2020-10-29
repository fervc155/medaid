<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->subject = $data['subject']??'';
        $this->url = $data['url']??'';
        $this->text = $data['text']??'';
        $this->btnText = $data['btnText']??'Ver notificacion';
        $this->salutation=$data['salutation']??"MedAid";

        
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
        $message= (new MailMessage)
        ->subject($this->subject)
        ->greeting($this->subject);

        if(is_array($this->text))
        {

            foreach ($this->text as $line) 
            {

                $message->line($line);
            }
        }
        else
        {
                            $message->line($this->text);

        }
        $message->action($this->btnText, $this->url)
        ->salutation($this->salutation);


        return $message;
    }

 
}
