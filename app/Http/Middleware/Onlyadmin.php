<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Onlyadmin
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
        if(!Auth::check()) return redirect("login");        
        if(Auth::user()->role != "1") {
            return redirect("/dashboard")->with("fail","You dont have permission");
        }
        return $next($request);
    }
}
