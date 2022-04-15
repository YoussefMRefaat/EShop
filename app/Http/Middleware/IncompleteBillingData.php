<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IncompleteBillingData
{
    /**
     * Redirect if the user's billing data is incomplete.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->user()->address || !auth()->user()->phone)
            return back()->with('error' , 'Please complete your data to place the order');
        return $next($request);
    }
}
