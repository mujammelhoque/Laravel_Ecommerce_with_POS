<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Items;
use App\Models\Sales;
use App\Models\SalesItem;
use App\Models\ShippingDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class WebUserDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('webuser');
    }
    public function index()
    {

        $user = Customer::where('user_id', Auth::id())->first();

        // return $user;
        return view('front.user.index', compact('user'));
    }
    public function edit()
    {
        $user = Customer::where('user_id', Auth::id())->first();
        return view('front.user.edit', compact('user'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' =>  'required',
            'gender' =>  'required',
            'phone' => 'required',
            'address' =>  'required',
            'city' =>  'required',
            'state' =>  'required',
            'zip' =>  'required',
            'country' =>  'required',
        ]);
        $customer = Customer::where('user_id', Auth::id())->first();
        if ($customer) {
            Customer::where('user_id', Auth::id())->update(
                [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'gender' => $request->gender,
                    'email' => Auth::user()->email,
                    'phone' => $request->phone,
                    'address1' => $request->address,
                    'address2' => "nai",
                    'city' => $request->city,
                    'state' => $request->state,
                    'zip' => $request->zip,
                    'country' => $request->country,
                ]
            );
        } else {
            // return $auth;
            $customer = new Customer();
            $customer->user_id = Auth::id();
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->gender = $request->gender;
            $customer->email = Auth::user()->email;
            $customer->phone = $request->phone;
            $customer->address1 = $request->address;
            $customer->city = $request->city;
            $customer->state = $request->state;
            $customer->zip = $request->zip;
            $customer->country = $request->country;
            $customer->address2 = "nai";
            $customer->account = "nai";
            $customer->total = 0.00;
            $customer->discount = 0;
            $customer->taxable = 1;
            $customer->comments = "nai";
            $customer->company = "nai";
            $customer->save();
        }

        return redirect()->back()->with('success', "Profile Updated");
    }
    public function orderDetails()
    {
        $details = Sales::where('user_id', Auth::id())->where('sale_type', 'web')->get();
        return view('front.user.orderdetails', compact('details'));
    }
    public function orderCancel(Request $request)
    {
        // return $request->id;
        try {
            $sales_items = SalesItem::where('sales_id', $request->id)->get();
            foreach ($sales_items as $item) {
                Items::find($item->items_id)->increment('quantity', $item->quantity);
            }
            ShippingDetails::where('sales_id', $request->id)->delete();
            SalesItem::where('sales_id', $request->id)->delete();
            Sales::where('id', $request->id)->delete();

            return "yes";
        } catch (\Exception $e) {
            return "no";
        }
    }
    public function orderView($id)
    {
        $shiping_details = ShippingDetails::where('sales_id', $id)->first();
        $sales = Sales::where('id', $id)->first();
        $sales_items = SalesItem::with('item')->where('sales_id', $id)->get();
        return view('front.user.view', compact('shiping_details', 'sales', 'sales_items'));
    }
    public function orderDownload(Request $request)
    {
        $shiping_details = ShippingDetails::where('sales_id', $request->id)->first();
        $sales = Sales::where('id', $request->id)->first();
        $sales_items = SalesItem::with('item')->where('sales_id', $request->id)->get();

        $data = [
            'shiping_details' => $shiping_details,
            'sales' => $sales,
            'sales_items' => $sales_items
        ];
        $pdf = PDF::loadView('front.user.pdf', $data);
        // $pdf = PDF::loadView('front.user.pdf', compact('shiping_details', 'sales', 'sales_items'));
        return $pdf->download($sales->invoice_id . '.pdf');
    }
    public function test()
    {
        // return Category::with('item')->where('id', 4)->get();
        // return Items::with('categories')->get();
        $t = Category::with(['item'])->find(5);
        return ($t->item);
        foreach ($t->categories as $value) {
            echo $value;
        }
    }
}
