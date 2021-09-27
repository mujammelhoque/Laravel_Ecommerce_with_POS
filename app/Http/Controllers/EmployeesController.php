<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Employees;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{

    public function __construct()
    {
        $this->middleware('onlyadmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employess = Employees::orderby('id', 'DESC')->get();
        return view('employees.index', compact('employess'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {

        $file = $request->file('image');
        $file->getClientOriginalExtension();
        $path = base_path() . "/public/uploads/employees/";
        $imageName = mb_substr(str_replace(" ", "-", $request->first_name), 0, 70) . "." . $file->getClientOriginalExtension();
        $file->move($path, $imageName);

        $user = new User();
        $user->name = $request->first_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = '5';
        $user->created_at = Carbon::now();
        $user->save();

        $employee = new Employees();
        $employee->user_id = $user->id;
        $employee->loginname = $request->first_name;
        $employee->password = $user->password;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->gender = $request->gender;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->role = 6;
        $employee->image = $imageName;
        $employee->employeeid = $request->employeeid;
        $employee->save();

        return redirect()->to('/employees')->with('success', 'Employee Successfully Added');
    }

    public function edit($id)
    {
        $employee_data = Employees::find($id);
        return view('employees.updateemployee', compact('employee_data'));
    }


    public function update(EmployeeUpdateRequest $request)
    {
        $image = $request->file('image');
        $old_image = Employees::find($request->id)->image;
        if ($image == null) {
            $new_image = $old_image;
        } else {
            $old_image_path = base_path() . "/public/uploads/employees/" . $old_image;
            unlink($old_image_path);
            $path = base_path() . "/public/uploads/employees";
            $new_image = mb_substr(str_replace(" ", "-", $request->loginname), 0, 70) . "." . $image->getClientOriginalExtension();
            $image->move($path, $new_image);
        }

        $data = [
            'loginname' => $request->loginname,
            'password' => $request->password,
            'role' => 6,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'image' => $new_image,
            'updated_at' => Carbon::now()
        ];

        Employees::find($request->id)->update($data);
        return redirect()->to('/employees')->with('success', 'Eemployees Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employees)
    {
        //
    }
    public function newEmployees()
    {
        return view('employees.newemployee');
    }

    // public function smssend(){
    //     return view('employees.smssend');
    // }
    public function employeeupdate()
    {
        return view('employees.updateemployee');
    }
}
