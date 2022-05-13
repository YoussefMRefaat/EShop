<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\TotalPriceCalculator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    use TotalPriceCalculator;

    /**
     * Display all orders
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $orders = Order::with('user')->paginate(10);
        return $this->indexView($orders);
    }

    /**
     * Display orders that have certain status
     *
     * @param OrderStatus $orderStatus
     * @return \Illuminate\View\View
     */
    public function status(OrderStatus $orderStatus): \Illuminate\View\View
    {
        $orders = Order::with('user')->where('status' , $orderStatus)->paginate(10);
        return $this->indexView($orders);
    }

    /**
     * Get the view of displaying orders
     *
     * @param LengthAwarePaginator $orders
     * @return \Illuminate\View\View
     */
    public function indexView(LengthAwarePaginator $orders): \Illuminate\View\View
    {
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
