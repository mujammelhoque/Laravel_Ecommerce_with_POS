<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('webuser');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlists = Wishlist::with('item')->where('user_id', Auth::id())->get();
        return view('front/wishlist', compact('wishlists'));
    }


    public function add_wishlist($id)
    {
        if (!Auth::id()) {
            return redirect()->to('/login')->with('warning', 'Your are not User Please login first');
        }
        if (Wishlist::where('user_id', Auth::user()->id)->where('item_id', $id)->exists()) {
            return redirect()->back()->with('fail', 'This product already added to Wishlist');
        }
        try {
            Wishlist::insert([
                'user_id' => Auth::user()->id,
                'item_id' => $id
            ]);
            return redirect()->back()->with('success', 'This Product Added to Wishlist');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Something Worng');
        }
    }


    public function remove_wishlist($id)
    {
        try {
            Wishlist::destroy($id);
            return redirect()->back()->with('success', 'Product Deleted From Wishlist');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Something Worng');
        }
    }
}
