<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Prueba extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    //Mensaje que aparecerá en el email enviado
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Parece que has accedido a la página principal de MedAid.')
                    ->action('¡Visítanos de nuevo!', url('/'))
                    ->line('Ponga el 100 profe.');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
