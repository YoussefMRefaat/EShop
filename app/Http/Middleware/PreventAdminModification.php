<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventAdminModification
{
    /**
     * Make admins data inaccessible.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next): \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    {
        if($request->route('user')->is_admin) abort(403);
        return $next($request);
    }
}
