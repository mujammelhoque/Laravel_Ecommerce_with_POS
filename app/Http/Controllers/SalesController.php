<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employees;
use App\Models\Items;
use App\Models\ReceivingsItems;
use App\Models\Sales;
use App\Models\SalesItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employees::all();
        //        return $employee;

        return view('sales.index', compact('employee'));
    }
    public function newitem()
    {
        return view('sales.addItems');
    }
    public function newCustomer()
    {
        return view('sales.newcustomer');
    }
    public function manage()
    {
        $all_sales = Sales::with('customer')->where('sale_type','store')->orderby('id', "DESC")->get();
    //    foreach ($all_sales as $value) {
    //       return $value->customer->first_name;
    //    }
        return view('sales.manage', compact('all_sales'));
    }
    public function suspended()
    {
        return view('sales.suspended');
    }

    public function sales_items(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $items = Items::orderby('name', 'asc')->select('id', 'name')->limit(5)->get();
        } else {
            $items = Items::orderby('name', 'asc')->select('id', 'name', 'unit_price', 'sku', 'serialno')
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('sku', 'like', '%' . $search . '%')
                ->orWhere('serialno', 'like', '%' . $search . '%')
                ->limit(5)->get();
        }
        $response = array();
        foreach ($items as $item) {
            $response[] = array('search' => $request->search, 'cost' => $item->unit_price, 'name' => $item->name, 'value' => substr($item->name, 0, 20) . " - " . $item->sku, 'id' => $item->id);
        }

        return response()->json($response);
    }
    public function sales_employee(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $items = Customer::orderby('name', 'asc')->select('id', 'name')->limit(5)->get();
        } else {
            $items = Customer::orderby('first_name', 'asc')->select('id', 'first_name', 'last_name', 'phone')
                ->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->limit(5)->get();
        }
        $response = array();
        foreach ($items as $item) {
            $response[] = array('search' => $request->search, 'name' => $item->first_name . ' ' . $item->last_name, 'value' => $item->first_name . ' ' . $item->last_name, 'label' => $item->first_name . ' ' . $item->last_name, 'id' => $item->id);
        }
        return response()->json($response);
    }


    public function sales_store(Request $request)
    {
        $old_invoice_id = Sales::max('invoice_id');
        if ($old_invoice_id) {
            $ex = explode('-', $old_invoice_id);
            $new_invoice_id = '45-' . $ex[1] + 1;
        } else {
            $new_invoice_id = '45-645464110';
        }


        $invoice_id = rand(1200000, 99999999);
        $customer_id = $request->customer_id;
        $employee_id = $request->employee;
        $comment = $request->comment;
        $total = $request->total;
        $discount = $request->discount;
        $coupon = "Not Found";
        $finaltotal = $request->subtotal;
        $payment_type = $request->payment_type;
        $payment_status = $request->payment_status;
        $sale_type = "store";
        $created_at = Carbon::now();

        $sales = new Sales();
        $sales->invoice_id = $new_invoice_id;
        $sales->customer_id = $customer_id;
        $sales->employee_id  = $employee_id;
        $sales->comments = $comment;
        $sales->total = $total;
        $sales->discount = $discount;
        $sales->coupon = "nocoupon";
        $sales->finaltotal = $finaltotal;
        $sales->payment_type = $payment_type;
        $sales->payment_status = $payment_status;
        $sales->sale_type = $sale_type;
        $sales->created_at = Carbon::now();
        $sales->updated_at = null;
        $sales->save();
        // return json_encode($sales);

        $ids = $request->ids;
        $qty = $request->qty;

        for ($i = 0; $i < count($ids); $i++) {
            $sales_items = new SalesItem();
            $sales_items->sales_id = $sales->id;
            $sales_items->items_id = $ids[$i];
            $sales_items->quantity = $qty[$i];
            $sales_items->unit_price = Items::find($ids[$i])->unit_price;
            $sales_items->cost_price = Items::find($ids[$i])->cost_price;
            $sales_items->discount_percent = 0;
            $sales_items->attributes = Items::find($ids[$i])->attributes;
            $sales_items->created_at = Carbon::now();
            $sales_items->updated_at = null;
            $sales_items->save();
            Items::where('id', $ids[$i])->decrement('quantity', $qty[$i]);
        }

        return "Done";
    }
    public function destroy($id)
    {
        try {
            $sales_item = SalesItem::with('item')->where('sales_id', $id)->get();
            foreach ($sales_item as $item) {
                Items::where('id', $item->items_id)->increment('quantity', $item->quantity);
            }

            SalesItem::where('sales_id', $id)->delete();
            Sales::destroy($id);
            return redirect()->back()->with('success', 'Receiving Item Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Something wrong');
        }
    }
}
