<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;

class OrderStatus
{
    /**
     * Prevent the process if the status of the order is not given.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param string ...$status
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next , string ...$status): \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    {
        $order = $request->route('order');
        if(!in_array($order->status->value , $status))
            abort(409 , 'The order is not ready for this operation');
        return $next($request);
    }
}
