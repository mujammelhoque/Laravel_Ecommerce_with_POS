<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Items;
use App\Models\WhoUsed;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($coupon = ' ')
    {

        if (count(Cart::where('tempusertoken', Cookie::get('generate_cart_id'))->get()) < 1) {
            return redirect()->to('/')->with('warning', 'First You need to add some product in your cart');
        }
        if ($coupon == ' ') {
            $discount = 0;
            $coupon_msg = '';
        } else {
            if (Coupon::where('coupon', $coupon)->exists()) {
                $coupon_validity = Coupon::where('coupon', $coupon)->first()->coupon_validity;
                $discount = Coupon::where('coupon', $coupon)->first()->value;
                $coupon_msg = "valid";
                if ($coupon_validity > Carbon::now()->format('Y-m-d')) {
                    $cart_item_total = Cart::with('item')->where('tempusertoken', Cookie::get('generate_cart_id'))->get();
                    $total = 0;
                    foreach ($cart_item_total as $cart) {
                        $total += $cart->item->unit_price * $cart->quantity;
                    }
                    if (Coupon::where('coupon', $coupon)->first()->price_limit) {
                        if ($total > Coupon::where('coupon', $coupon)->first()->price_limit) {
                            $discount = 0;
                            $coupon_msg = 'Total price must be maximum' . Coupon::where('coupon', $coupon)->first()->price_limit;
                        }
                    }
                    if (WhoUsed::where('user_id', Auth::id())->where('coupon_id', Coupon::where('coupon', $coupon)->first()->id)->exists()) {
                        $discount = 0;
                        $coupon_msg = "You are already used this Coupon";
                    }
                    if (Coupon::where('coupon', $coupon)->first()->used > Coupon::where('coupon', $coupon)->first()->max_used ) {
                        $discount = 0;
                        $coupon_msg = "Coupon Limit Expired";
                    }
                } else {
                    $discount = Coupon::where('coupon', $coupon)->first()->value;
                    $coupon_msg = 'This Coupons Code Expired';
                }
            } else {
                $discount = 0;
                $coupon_msg = 'There Is No Coupon That you Entered';
            }
        }
        $cart_products = Cart::where('tempusertoken', Cookie::get('generate_cart_id'))->get();
        return view('front.cart', compact('cart_products', 'discount', 'coupon_msg', 'coupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request, $id)
    {
        $quantity = 1;
        if ($request->isMethod('post')) {
            $quantity = $request->qty;
        }

        if ($request->isMethod('get')) {
            $quantity = 1;
        }
        // return $quantity;
        $product = Items::where('id', $id)->first();
        if (Cookie::get('generate_cart_id')) {
            $tempusertoken = Cookie::get('generate_cart_id');
        } else {
            $tempusertoken = Str::random(16);
            Cookie::queue(Cookie::make('generate_cart_id', $tempusertoken, 20160)); //20160 = 14 day thakbe
        }
        if (Wishlist::where('item_id', $product->id)->exists()) {
            Wishlist::where('item_id', $product->id)->delete();
        }
        if (Cart::where('tempusertoken', $tempusertoken)->where('item_id', $product->id)->exists()) {
            Cart::where('tempusertoken', $tempusertoken)->where('item_id', $product->id)->increment('quantity', $quantity);
        } else {
            $add_to_cart = new Cart();
            $add_to_cart->user_id = Auth::id();
            $add_to_cart->item_id = $product->id;
            $add_to_cart->tempusertoken = $tempusertoken;
            $add_to_cart->quantity = $quantity;
            $add_to_cart->created_at = Carbon::now();
            $add_to_cart->updated_at = null;
            $add_to_cart->save();
        }

        if ($request->isMethod('get')) {
            return redirect()->back()->with('success', 'Product Added to Cart!!');
        } else {
            return "ok";
        }
    }

    public function update_cart(Request $request)
    {
        Cart::where('id', $request->id)->update(['quantity' => $request->qty]);
        return "updated";
    }


    public function removeCart($id)
    {
        try {
            Cart::destroy($id);
            return redirect()->back()->with('success', 'Product Deleted From Cart!!');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Something Wrong!!');
        }
    }
}
