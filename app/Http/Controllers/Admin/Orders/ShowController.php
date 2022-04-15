<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\TotalPriceCalculator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    use TotalPriceCalculator;

    /**
     * Display all orders
     *
     * @param string|null $status
     * @return \Illuminate\View\View
     */
    public function index(string $status = null): \Illuminate\View\View
    {
        $orders = ($status && in_array($status , ['pending' , 'shipped' , 'delivered' , 'cancelled' , 'restored']))
            ? Order::with('user')->with('products')->where('status' , $status)->paginate(10)
            : Order::with('user')->with('products')->paginate(10);
        $this->calculateEveryTotalPrice($orders);
        return view('admin.orders.index' , compact('orders'));
    }

    /**
     * Display an order
     *
     * @param Order $order
     * @return \Illuminate\View\View
     */
    public function show(Order $order): \Illuminate\View\View
    {
        $order->load(['products' , 'user']);
        $this->calculateOneTotalPrice($order);
        return view('admin.orders.show' , compact('order'));
    }

}
