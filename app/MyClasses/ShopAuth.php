<?php

namespace App\MyClasses;
use App\Models\Employees;

class ShopAuth{
    public static function AuthCheck($n, $p){
        $checkemployee = Employees::where(['loginname'=> $n])->first();
        if(password_verify($p, $checkemployee->password)){
            session(['employeelogin'=> true]);
            session(['employeename'=> $n]);
            // return redirect('/shop/dashboard');
            return true;
        }else{
            return false;
            // return redirect('shop/login')->with('msg', 'Invalid username/password');
        }
    }
    public static function AuthInfo(){
        return [
            'name' => session('employeename')
        ];
    }    
}