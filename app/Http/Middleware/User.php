<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User
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
        if (Auth::user()->role != "2") {
            // Auth::logout();
            // $request->session()->invalidate();
            // $request->session()->regenerateToken();
            // return redirect("login")->with("status","You dont have permission");
            return redirect()->back()->with("fail", "You dont have permission");
        }
        return $next($request);
    }
}
