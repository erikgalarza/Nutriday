<?php

namespace App\Providers;

use App\Events\EventoMensaje;
use App\Listeners\ListenerMensaje;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
 
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        EventoMensaje::class => [
            ListenerMensaje::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
