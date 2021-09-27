<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employees;
use App\Models\Items;
use App\Models\Receiving;
use App\Models\ReceivingsItems;
use App\Models\SalesItem;
use App\Models\Suppliers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReceivingController extends Controller
{
    public function index()
    {
    //    return ReceivingsItems::all();

        return view('receiving.index');
    }
    public function newSuppliers()
    {
        return view('receiving.newsuppliers');
    }
    public function addItems()
    {
        return view('receiving.addItems');
    }
    public function manage()
    {
        $all_receiving = Receiving::with('suppliers')->orderby('id', "DESC")->get();
        return view('receiving.manage', compact('all_receiving'));
    }

    public function receivingSupplier(Request  $request)
    {

        $search = $request->search;
        if ($search == '') {
            $items = Suppliers::orderby('id', 'asc')->select('id', 'company_name', 'agency_name')->limit(5)->get();
        } else {
            $items = Suppliers::orderby('id', 'asc')->select('id', 'company_name', 'agency_name', 'account_number', 'first_name', 'last_name')
                ->where('company_name', 'like', '%' . $search . '%')
                ->orWhere('agency_name', 'like', '%' . $search . '%')
                ->orWhere('account_number', 'like', '%' . $search . '%')
                ->orWhere('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->limit(5)->get();
        }
        $response = array();
        foreach ($items as $item) {
            $response[] = array('search' => $request->search, 'company_name' => $item->company_name, 'value' => $item->company_name . ' ' . $item->agency_name, 'label' => $item->first_name . ' ' . $item->last_name, 'id' => $item->id);
        }
        return response()->json($response);
    }
    public function store(Request $request)
    {
        $old_invoice_id = Receiving::max('invoice_id');
        if ($old_invoice_id) {
            $ex = explode('-', $old_invoice_id);
            $new_invoice_id = 'r45-' . $ex[1] + 1;
        } else {
            $new_invoice_id = 'r45-0101010';
        }
        $invoice_id = Str::random(10);
        $supplier_id = $request->supplier_id;
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

        $receiving = new Receiving();
        $receiving->invoice_id = $new_invoice_id;
        $receiving->supplier_id = $supplier_id;
        $receiving->employee_id  = $employee_id;
        $receiving->comments = $comment;
        $receiving->total = $total;
        $receiving->discount = $discount;
        $receiving->coupon = "nocoupon";
        $receiving->finaltotal = $finaltotal;
        $receiving->payment_type = $payment_type;
        $receiving->payment_status = $payment_status;
        $receiving->created_at = Carbon::now();
        $receiving->updated_at = null;
        $receiving->save();

        $ids = $request->ids;
        $qty = $request->qty;

        for ($i = 0; $i < count($ids); $i++) {
            $sales_items = new ReceivingsItems();
            $sales_items->receivings_id = $receiving->id;
            $sales_items->items_id = $ids[$i];
            $sales_items->quantity = $qty[$i];
            $sales_items->unit_price = Items::find($ids[$i])->unit_price;
            $sales_items->cost_price = Items::find($ids[$i])->cost_price;
            $sales_items->discount_percent = 0;
            $sales_items->attributes = Items::find($ids[$i])->attributes;
            $sales_items->created_at = Carbon::now();
            $sales_items->updated_at = null;
            $sales_items->save();
            Items::where('id', $ids[$i])->increment('quantity', $qty[$i]);
        }

        return "Done";
    }
    public function download($id)
    {
        $receiving = Receiving::with('suppliers', 'employee')->where('id', $id)->first();
        $rec_items = ReceivingsItems::with('item')->where('receivings_id', $id)->get();
        return view('receiving.pdf', compact('receiving', 'rec_items'));
    }
    public function destroy($id)
    {
        try {
            $recive_items = ReceivingsItems::with('item')->where('receivings_id', $id)->get();
            foreach ($recive_items as $item) {
                Items::where('id', $item->items_id)->decrement('quantity', $item->quantity);
            }

            ReceivingsItems::where('receivings_id', $id)->delete();
            Receiving::destroy($id);
            return redirect()->back()->with('success', 'Receiving Item Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Something wrong');
        }
    }
}
