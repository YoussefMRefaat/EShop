<?php

namespace App\Listeners;

use App\Events\OrderRestored;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RestoreQuantity
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
     * @param  \App\Events\OrderRestored  $event
     * @return void
     */
    public function handle(OrderRestored $event)
    {
        foreach ($event->order->products()->get() as $product){
            $product->increment('stock' , $product->pivot->quantity);
        }
    }
}
