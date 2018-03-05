<?php

namespace App\Listeners;

use App\Events\ButtonTriggerEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ButtonTriggerListener
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
     * @param  ButtonTriggerEvent  $event
     * @return void
     */
    public function handle(ButtonTriggerEvent $event)
    {
        //
    }
}
