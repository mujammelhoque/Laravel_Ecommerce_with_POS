<?php

namespace App\Http\Controllers;

use App\Models\ItemKitProduct;
use App\Models\ItemKits;
use App\Models\Items;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ItemKitsController extends Controller
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
        $item_kits= ItemKits::all();
        return view('itemkits.index',compact('item_kits'));
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
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'baseimage'=>'required | mimes:jpg,bmp,png,svg,gif',
        ]);
//die;
        $file = $request->file('baseimage');
        $file->getClientOriginalExtension();
        $path= base_path()."/public/uploads/item_kits/";
        $imageName= mb_substr(str_replace(" ","-",$request->name),0,70).".".$file->getClientOriginalExtension();
        $file->move($path,$imageName);

        $kit_item= new ItemKits();
        $kit_item->name= $request->name;
        $kit_item->description= $request->description;
        $kit_item->baseimage = $imageName;
        $kit_item->created_at= Carbon::now();
        $kit_item->updated_at= null;
        $kit_item->save();

        $ids= $request->ids;
        $qty= $request->qty;
        for ($i = 0; $i < count($ids); $i++) {
            $item_kit_products= new ItemKitProduct();
            $item_kit_products->item_kits_id= $kit_item->id;
            $item_kit_products->item_id = $ids[$i];
            $item_kit_products->quantity = $qty[$i];
            $item_kit_products->created_at = Carbon::now();
            $item_kit_products->updated_at = null;
            $item_kit_products->save();
        }
        return redirect()->to('/itemkits')->with('success','item Kits Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemKits  $itemKits
     * @return \Illuminate\Http\Response
     */
    public function show(ItemKits $itemKits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemKits  $itemKits
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemKits $itemKits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemKits  $itemKits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemKits $itemKits)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemKits  $itemKits
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemKits $itemKits)
    {
        //
    }

    public function new(){
        return view('itemkits.new');
    }
}
