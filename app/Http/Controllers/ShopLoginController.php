<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\MyClasses\ShopAuth;

class ShopLoginController extends Controller
{
    public function index(){
        return view('employees.employeelogin');
    }
    public function login( Request $request){
        // print_r($request->all());
        $request->validate([
            'loginname' => 'required',
            'password' => 'required',
        ]);
        // $checkemployee = Employees::where(['loginname'=> $request->loginname, 'password' => $request->password])->count();
        // $checkemployee = Employees::where(['loginname'=> $request->loginname])->first();
        //  ShopAuth::AuthCheck($request->loginname, $request->password);
        // dd(ShopAuth::AuthCheck($request->loginname, $request->password));
        if(ShopAuth::AuthCheck($request->loginname, $request->password)){
            return redirect('/shop/dashboard');
        }else{
            return redirect('shop/login')->with('msg', 'Invalid username/password');
        }
        // dd($checkemployee);
        // dd($checkemployee);
        // if(password_verify($request->password, $checkemployee->password))
        // echo " password okey";
        // else echo " not okey";
        
    }
}
