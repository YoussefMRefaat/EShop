<?php

namespace App\Http\Controllers\User\Cart;

use App\Http\Controllers\Controller;
use App\Services\User\CartTotalCalcService;
use Illuminate\Http\Request;

class ShowController extends Controller
{

    /**
     * Display the cart page
     *
     * @param CartTotalCalcService $service
     * @return \Illuminate\View\View
     */
    public function index(CartTotalCalcService $service): \Illuminate\View\View
    {
        $products = auth()->user()->cart()->first()->products()->get();
        $total = $service->calc($products);
        return view('user.cart' , compact('products' , 'total'));
    }

}
