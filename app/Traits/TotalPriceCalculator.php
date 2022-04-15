<?php

namespace App\Traits;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

trait TotalPriceCalculator{
    // This should be in the Order model...

    /**
     * Calculate the total price of every order
     *
     * @param Collection|LengthAwarePaginator $orders
     */
    protected function calculateEveryTotalPrice(Collection|LengthAwarePaginator $orders){
        foreach($orders as $order){
            $i = 0;
            foreach($order->products as $product){
                $i += $product->pivot->each_price * $product->pivot->quantity;
            }
            $order['total_price'] = $i + $order->ship_fee;
        }
    }

    /**
     * Calculate the total price of an order
     *
     * @param Order $order
     */
    protected function calculateOneTotalPrice(Order $order){
        $i = 0;
        foreach($order->products as $product){
            $i += $product->pivot->each_price * $product->pivot->quantity;
        }
        $order['total_price'] = $i + $order->ship_fee;
    }

}
