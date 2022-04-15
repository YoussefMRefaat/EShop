<?php

namespace App\Services\User;

use App\Models\Order;

class OrderProductsAttachService{

    /**
     * Attach the products to their order
     *
     * @param Order $order
     */
    public function attach(Order $order){
        $products = auth()->user()->cart()->first()->products()->get();
        foreach ($products as $product){
            $order->products()->attach($product->id ,
                ['quantity' => $product->pivot->quantity , 'each_price' => $product->price]);
        }
    }

}
