<?php

namespace App\Listeners;

use App\Events\ProductImageUpdated;
use App\Traits\ImageHandler;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateProductImage
{
    use ImageHandler;

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
     * @param  \App\Events\ProductImageUpdated  $event
     * @return void
     */
    public function handle(ProductImageUpdated $event)
    {
        $this->deleteImage($event->product->image);
        $path = $this->saveImage(request()->file('image') , 'products');
        $event->product->update(['image' => $path]);
    }
}
