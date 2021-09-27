<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserMangementController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('users.index', compact('users'));
    }
    public function permission(Request $request)
    {
        try {
            User::find($request->id)->update(['role' => $request->role]);
            return redirect()->back()->with('success', "User Permession Updated Successfully!!");
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', "Something Worng!");
        }
    }
    public function addUser(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required |email|unique:users',
                'password' => 'required |confirmed |min:5|max:30',
                'password_confirmation' => 'required|min:5|max:30',
                'role' => 'required',
            ]);
            try {
                User::insert([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => $request->role,
                ]);
                return redirect()->to('/users')->with('success', 'User Successfully Added');
            } catch (\Exception $e) {
                return redirect()->to('/users')->with('fail', 'Something Worng');
            }
        }
        return view('users.add');
    }
}
