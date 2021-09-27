<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "1") return redirect("dashboard");
            if (Auth::user()->role == "2") return redirect("/");
            if (Auth::user()->role == "3") return redirect("/supplier/dashboard");
            if (Auth::user()->role == "4") return redirect("/dashboard");
            if (Auth::user()->role == "5") return redirect("/dashboard");
        }
    }
}
