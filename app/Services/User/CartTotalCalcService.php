<?php

namespace App\Services\User;

use Illuminate\Database\Eloquent\Collection;

class CartTotalCalcService{

    /**
     * Calculate the total price of the cart
     *
     * @param Collection $products
     * @return float
     */
    public function calc(Collection $products): float
    {
        $total = 0;
        foreach ($products as $product)
        {
            $product->total = $product->price * $product->pivot->quantity;
            $total += $product->total;
        }
        return $total;
    }
}
