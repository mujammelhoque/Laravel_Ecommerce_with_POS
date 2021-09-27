<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Shopend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        //TODO: check employee logged in users authentication and role. If role not defined redirect to home page or login page
        //if (! $request->user()->hasRole($role)) {
            // Redirect...
        //}
        return $next($request);
    }
}
