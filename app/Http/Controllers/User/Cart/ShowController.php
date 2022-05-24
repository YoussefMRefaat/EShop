<?php

namespace App\Http\Controllers\User\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;

class ShowController extends Controller
{

    /**
     * Display the cart page
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $cart = Cart::findOrFail(session()->get('cartId'));
        $products = $cart->products()->get();
        $total = $cart->total_price;
        return view('user.cart' , compact('products' , 'total'));
    }

}
