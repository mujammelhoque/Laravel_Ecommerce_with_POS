<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Items;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('front/index');
    }
    public function single_categorie($id)
    {
        $cat_name = Category::where('parent_id', $id)->first();
        if ($cat_name != null) {
            $cat_name = $cat_name;
        } else {
            $cat_name = Category::where('id', $id)->first();
        }
        // return $cat_name;
        $cat_products = Category::with(['item'])->find($id);
        // return $cat_products->item;
        // foreach ($t->item as $value) {
        //     echo $value->name;
        // }
        return view('front.user.singlecat', compact('cat_products', 'cat_name'));
    }
    public function shop()
    {
        $populer_products = Items::orderBy('id', 'ASC')->get();
        $catwize_product = Category::with('item')->where('parent_id', 0)->orderBy('id', 'DESC')->take(5)->get();
        // $catwize_product;

        // return  $catwize_product;
        // foreach ($catwize_product as $value) {
        //     echo $value->item;
        // }
        // die;
        return view('front.shop', compact('populer_products', 'catwize_product'));
    }
    public function search($search)
    {

        $items = Items::where('name', 'like', '%' . $search . '%')->orWhere('sku', 'like', '%' . $search . '%')->orWhere('unit_price', 'like', '%' . $search . '%')->get();
        return view('front.search', compact('items', 'search'));
    }
}
