<?php

namespace App\Http\Controllers;

use App\MyClasses\ShopAuth;
use Illuminate\Http\Request;


class ShopDashboardController extends Controller
{
   public function index(){

    return view('shop.dashboard.index');
   // echo ShopAuth::AuthInfo()['name'];
   // echo $path = storage_path();
   // dd(ShopAuth::AuthInfo());
    
   }

}
