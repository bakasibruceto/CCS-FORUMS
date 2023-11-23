<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event): void
    {
        Log::info('User logged in', ['user_id' => $event->user->id]);
    }
}
