<?php

namespace App\Notifications;

use App\Models\Mensaje;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotificacionMensaje extends Notification
{
    use Queueable;

    public function __construct(Mensaje $mensaje)
    {
        $this->mensaje = $mensaje;
    }

    
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

   
    public function toArray($notifiable)
    {
        return [
            "nombres"=>$this->mensaje->nombres,
                "correo"=>$this->mensaje->correo,
                "asunto"=>$this->mensaje->asunto,
                "mensaje"=>$this->mensaje->mensaje,
                "icon"=>"fa-shopping-cart",
                "titulo"=>"Nueva consulta"
        ];
    }
}
