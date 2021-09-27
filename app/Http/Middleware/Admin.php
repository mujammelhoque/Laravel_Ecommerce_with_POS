<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) return redirect("login");
        $adminroles = ["1", "4", '5'];
        if (!in_array(Auth::user()->role, $adminroles)) {
            return redirect("/")->with("fail", "You dont have permission");
        }
        return $next($request);
    }
}
