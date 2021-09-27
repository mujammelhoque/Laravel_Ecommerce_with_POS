<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CustomerController extends Controller
{

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allcustomer = Customer::paginate(10);
        return view('customer.index',compact('allcustomer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        /*
,"gender"
        ,"email"
        ,"phone"
        ,"address1"
        ,"address2"
        ,"city"
        ,"state"
        ,"zip"
        ,"country"
        ,"company"
        ,"account"
        ,"total"
        ,"discount"
        ,"taxable"
        ,"comments"
        */
        $rules = [
			'first_name' => 'required|string|min:3|max:255',
			'last_name' => 'required|string|min:3|max:255',
			'gender' => 'required',
			'email' => 'required|string|email|max:255',
			'phone' => 'required|string|max:15',
			'address1' => 'required|string|max:150',
			'address2' => 'required|string|max:150',
			'city' => 'required|string|max:50',
			'state' => 'required|string|max:50',
			// 'zip' => 'required|string|max:10',
			'country' => 'required|string|max:50',
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect()->back()
			->withInput()
			->withErrors($validator);
		}
        else{
            Customer::create($request->all());
            return redirect()->route('customer.index')->with('success','Customer '.$request->first_name.' created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        // $customer = Customer::find($customer);
        //dd($customer);
        //echo "edit called";
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $cus_to_update = Customer::find($customer->id)->update($request->all());
        return back()->with('success','Customer update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return back()->with('success','Customer deleted successfully');
    }
}
