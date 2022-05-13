<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Enums\OrderStatus;
use App\Events\OrderRestored;
use App\Events\OrderShipped;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Mark an order as shipped
     *
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function ship(Order $order): \Illuminate\Http\RedirectResponse
    {
        $order->update(['status' => OrderStatus::Shipped , 'shipped_at' => now()]);
        OrderShipped::dispatch($order);
        return redirect(route('dashboard.orders'))->with('success' , 'Order has been shipped successfully');
    }

    /**
     * Mark an order as delivered
     *
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deliver(Order $order):\Illuminate\Http\RedirectResponse
    {
        $order->update(['status' => OrderStatus::Delivered , 'delivered_at' => now()]);
        return redirect(route('dashboard.orders'))->with('success' , 'Order has been delivered successfully');
    }

    /**
     * Mark an order as cancelled
     *
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel(Order $order): \Illuminate\Http\RedirectResponse
    {
        $order->update(['status' => OrderStatus::Cancelled]);
        return redirect(route('dashboard.orders'))->with('success' , 'Order has been cancelled successfully');
    }

    /**
     * Mark a repealed order as restored after being cancelled or before being shipped
     *
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Order $order): \Illuminate\Http\RedirectResponse
    {
        $order->update(['status' => OrderStatus::Restored]);
        OrderRestored::dispatch($order);
        return redirect(route('dashboard.orders'))->with('success' , 'Order has been restored successfully');
    }

}
