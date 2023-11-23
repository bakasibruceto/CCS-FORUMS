<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogSuccessfulLogout
{
    /**
     * Handle the event.
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        \App\Models\Log::create([
            'user_id' => $event->user->id,
            'actions' => "User logged out",
        ]);
    }
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

}
