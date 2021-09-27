<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WebOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('onlyadmin');
    }
    public function index()
    {
        $sales =  Sales::with('user')->where('sale_type', 'web')->get();
        return view('weborder.index', compact('sales'));
    }
    public function update(Request $request)
    {
        try {
            $data = ['order_status' => $request->order_status];
            Sales::where('id', $request->id)->update($data);
            return $request->order_status;
        } catch (\Exception $e) {
            return 'no';
        }
    }
    public function coupons()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('coupon.index', compact('coupons'));
    }
    public function addCoupon()
    {
        return view('coupon.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'coupon' => 'required',
            'value' => 'required|numeric',
            'coupon_validity' => 'required',
        ]);
        try {
            Coupon::insert([
                'coupon' => $request->coupon,
                'value' => $request->value,
                'price_limit' => $request->price_limit,
                'max_used' => $request->max_used,
                'coupon_validity' => $request->coupon_validity,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ]);
            return redirect()->to('/coupons')->with('success', 'Coupon Created Successfully');
        } catch (\Exception $e) {
            return redirect()->to('/coupons')->with('fail', 'Something Worng');
        }
        // return $request->all();
    }
    public function editCoupon($id)
    {
        $coupon = Coupon::find($id)->first();
        return view('coupon.edit', compact('coupon'));
    }
    public function updateCoupon(Request $request)
    {
        $request->validate([
            'coupon' => 'required',
            'value' => 'required|numeric',
            'coupon_validity' => 'required',
        ]);
        try {
            Coupon::where('id', $request->id)->update([
                'coupon' => $request->coupon,
                'value' => $request->value,
                'price_limit' => $request->price_limit,
                'max_used' => $request->max_used,
                'coupon_validity' => $request->coupon_validity,
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->to('/coupons')->with('success', 'Coupon Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->to('/coupons')->with('fail', 'Something Worng');
        }
    }
    public function deleteCoupon($id)
    {
        try {
            Coupon::find($id)->delete();
            return redirect()->to('/coupons')->with('success', 'Coupon Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->to('/coupons')->with('fail', 'Something Worng');
        }
    }
}
