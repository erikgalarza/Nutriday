<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EventoMensaje
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

   
    public function __construct($mensaje)
    {
        $this->mensaje = $mensaje;
    }


    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
