<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RestorableOrder
{
    /**
     * Check if the order is restorable.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $order = $request->route('order');
        if($order->shipped_at && $order->shipped_at < now()->subWeeks(2))
            abort(409 , 'Order cannot be cancelled after 14 days from delivering');
        return $next($request);
    }
}
