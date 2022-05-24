<?php

namespace App\Services\User;

use App\Models\Cart;
use App\Models\Order;

class OrderProductsAttachService{

    /**
     * Attach the products to their order
     *
     * @param Order $order
     */
    public function attach(Order $order){
        $cart = Cart::findOrFail(session()->get('cartId'));
        $products = $cart->products()->get();
        foreach ($products as $product){
            $order->products()->attach($product->id ,
                ['quantity' => $product->pivot->quantity , 'each_price' => $product->price]);
        }
        $cart->products()->detach();
    }

}
