<?php

namespace App\Listeners;

use App\Mail\NovoAcesso;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class LoginListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event)
    {
        Log::debug("Logou com sucesso!");
        Log::debug($event->user->name);
        Log::debug($event->user->email);

        $quando = now()->addMinutes(5);

        // user, users[], email
        Mail::to($event->user)
            //->send(new NovoAcesso($event->user));
            //->queue(new NovoAcesso($event->user));
            ->later($quando, new NovoAcesso($event->user));
    }
}
