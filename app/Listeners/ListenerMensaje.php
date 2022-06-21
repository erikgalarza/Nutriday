<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\NotificacionMensaje;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class ListenerMensaje
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

  
    public function handle($event)
    {
        User::role('Administrador')
        ->each(function(User $user) use ($event){
            Notification::send($user, new NotificacionMensaje($event->mensaje));
        });
    }
}
