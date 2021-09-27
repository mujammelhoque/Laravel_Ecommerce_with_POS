<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Employee
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
        // $adminroles = ["1", "4"];
        if (!Auth::user()->role == '5') {
            return redirect("/")->with("fail", "You dont have permission");
        }
        return $next($request);
    }
}
