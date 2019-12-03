<?php

namespace App\Listeners;

use App\Events\HomeEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class HomeEventListener
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

    /**
     * Handle the event.
     *
     * @param  MeuEvento  $event
     * @return void
     */
    public function handle(HomeEvent $event)
    {
        //info('Entrou no evento');
        //info($event->text);

        Log::debug($event->text);

        // Quebra a cadeia de chamada de listener
        return false;
    }
}
