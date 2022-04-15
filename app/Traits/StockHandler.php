<?php

namespace App\Traits;

use App\Models\Order;

trait StockHandler{

    /**
     * Decrement the stock when shipping the order
     *
     * @param Order $order
     */
    protected function shipped(Order $order){
        foreach ($order->products()->get() as $product){
            $product->decrement('stock' , $product->pivot->quantity);
        }
    }

    /**
     * Increment the stock when restoring the order
     *
     * @param Order $order
     */
    protected function restored(Order $order){
        foreach ($order->products()->get() as $product){
            $product->increment('stock' , $product->pivot->quantity);
        }
    }

}
