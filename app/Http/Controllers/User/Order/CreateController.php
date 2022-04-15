<?php

namespace App\Http\Controllers\User\Order;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Services\User\CartTotalCalcService;
use App\Services\User\OrderProductsAttachService;
use App\Services\User\OrderShipCalcService;
use Illuminate\Http\Request;

class CreateController extends Controller
{

    /**
     * Display the order checkout page
     *
     * @param CartTotalCalcService $totalService
     * @param OrderShipCalcService $shipService
     * @return \Illuminate\View\View
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function create(CartTotalCalcService $totalService , OrderShipCalcService $shipService):\Illuminate\View\View
    {
        $products = Cart::findOrFail(session()->get('cartId'))->products()->get();
        $ship = $shipService->calc();
        $total = $totalService->calc($products);
        return view('user.checkout' , compact('products' , 'total' , 'ship'));
    }

    /**
     * Handle the request of creating an order
     *
     * @param OrderShipCalcService $shipService
     * @param OrderProductsAttachService $attachService
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function store(OrderShipCalcService $shipService , OrderProductsAttachService $attachService):\Illuminate\Http\RedirectResponse
    {
        $ship = $shipService->calc();
        $order = Order::create(['user_id' => auth()->id(), 'ship_fee' => $ship ,]);
        $attachService->attach($order);
        Cart::findOrFail(session()->get('cartId'))->products()->detach();
        return redirect(route('checkout'))
            ->with('success' , 'Order has been placed successfully and its number is ' . $order->id);
    }

}
