<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\StockHandler;
use Illuminate\Http\Request;

class EditController extends Controller
{
    use StockHandler;

    /**
     * Mark an order as shipped
     *
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function ship(Order $order): \Illuminate\Http\RedirectResponse
    {
        $order->update(['status' => 'shipped' , 'shipped_at' => now()]);
        $this->shipped($order);
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
        $order->update(['status' => 'delivered' , 'delivered_at' => now()]);
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
        $order->update(['status' => 'cancelled']);
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
        $order->update(['status' => 'restored']);
        $this->restored($order);
        return redirect(route('dashboard.orders'))->with('success' , 'Order has been restored successfully');
    }

}
