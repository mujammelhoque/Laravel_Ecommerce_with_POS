<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Image;
use App\Models\Sales;
use App\Models\SalesItem;
use App\Models\ShippingDetails;
use App\Models\WhoUsed;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Mockery\Generator\StringManipulation\Pass\Pass;

class ProductController extends Controller
{
    public function index($id)
    {
        $item = Items::with('categories')->where('id', $id)->first();
        // return $item;

        // $arr=[];
        // foreach ($item->categories->toArray() as $key => $value) {
        //     echo $value->id;
        // }
        // // return $arr;
        // die;
        // $catt = [3,4];
        // $ci = Category::whereIn('id',$catt)->get();
        // foreach ($ci as $key => $value) {
        //     dd($value->item);
        // }
        // DB::table()
        $images = Image::where('item_id', $id)->get();
        $related_product = Items::all()->except($id)->take(4);

        // $related_product= Items::all();
        // return $related_product;
        return view('front.single', compact('item', 'images', 'related_product'));
    }
    public function bundle_product($id){
       return $id; 
    }
    public function checkout()
    {
        if(!Auth::check()){
            // return "nai";
            return redirect()->to('/login');
        }
        if (Auth::user()->role != 2) {
            return redirect()->back()->with('fail', 'Your have no permission or you are not customer!!!');
        }
        return view('front.checkout');
    }
    public function order(Request $request)
    {
        
        if (Auth::user()->role != 2) {
            return redirect()->back()->with('fail', 'Your have no permission or you are not customer!!!');
        }
        if ($request->payment_type == 'cash') {

            $old_invoice_id = Sales::max('invoice_id');
            if ($old_invoice_id) {
                $id = explode('-', $old_invoice_id);
                $invoice_id = '45-' . $id[1] + 1;
            } else {
                $invoice_id = '45-01010125';
            }

            $sales = new Sales();
            $sales->user_id = Auth::id();
            // return $sales;
            // die;
            $sales->invoice_id = $invoice_id;
            $sales->comments = $request->note;
            $sales->comments = $request->note;
            $sales->payment_type = $request->payment_type;
            $sales->payment_status = 'incomplete';
            $sales->sale_type = 'web';
            $sales->order_status = 'pending';
            $sales->total = $request->total;
            $sales->discount = $request->discount;
            $sales->finaltotal = $request->subtotal;
            $sales->save();
            // return $sales;

            $shipping = new ShippingDetails();
            $shipping->sales_id = $sales->id;
            $shipping->full_name = $request->full_name;
            $shipping->company_name = $request->company_name;
            $shipping->email = $request->email;
            $shipping->phone = $request->phone;
            $shipping->address = $request->address;
            $shipping->state = $request->state;
            $shipping->country = $request->country;
            $shipping->city = $request->city;
            $shipping->save();
            // return $shipping;

            //Add products in salse item table
            $items = Cart::where('tempusertoken', Cookie::get('generate_cart_id'))->get();
            foreach ($items as $item) {
                // $item->item_id;
                // return Items::find($item->item_id)->unit_price;
                // die;
                $sales_item = new SalesItem();
                $sales_item->sales_id = $sales->id;
                $sales_item->items_id = $item->item_id;
                $sales_item->quantity = $item->quantity;
                $sales_item->unit_price = Items::find($item->item_id)->unit_price;
                $sales_item->cost_price = Items::find($item->item_id)->cost_price;
                $sales_item->save();
                // return $sales_item;
                // die;
                Items::where('id', $item->item_id)->decrement('quantity', $item->quantity);
            }
            if ($request->discount != 0) {
                // return session('coupon_code');
                // die;
                $coupon_id = Coupon::where('coupon', session('coupon_code'))->first()->id;
                Coupon::find($coupon_id)->increment('used');
                $who_used = new WhoUsed();
                $who_used->user_id = Auth::id();
                $who_used->coupon_id = $coupon_id;
                $who_used->created_at = Carbon::now();
                $who_used->updated_at = null;
                $who_used->save();
            }
            // return $sales_item;
            Cart::where('tempusertoken', Cookie::get('generate_cart_id'))->delete();


            return redirect()->to('/')->with('success', 'Your Order is Placed!!');
        }
    }
}
