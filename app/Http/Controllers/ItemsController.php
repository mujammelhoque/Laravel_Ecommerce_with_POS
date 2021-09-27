<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Items;
use App\Models\Suppliers;
use App\Models\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use PDF;

class ItemsController extends Controller
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
        $products = Items::with('categories')->orderBy('id', 'desc')->get();
        // dd($products->categories);
        // dd(json_decode($products[4]->toArray()['attributes']));
        return view('items.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newItem()
    {
        $suppliers = Suppliers::all()->pluck('company_name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        $units = [
            'gm' => 'gm', 'kg' => 'kg', 'lb' => 'lb', 'piece' => 'piece', 'dozon' => 'dozon', 'l' => 'l', 'ml' => 'ml',
            'inch' => 'inch', 'foot' => 'foot'
        ];

        $attributes = Attribute::with(['values'])->get();

        return view('items.create', compact('suppliers', 'categories', 'units', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:3|max:255',
            'supplier_id' => 'required',
            'sku' => 'required|string|min:3|max:255',
            'cost_price' => 'required|numeric',
            'unit_price' => 'required|numeric',
            'reorder_level' => 'required|numeric',
            'quantity' => 'required|numeric',
            'unit' => 'required',
            // 'attributes' => 'required',
            // 'loc' => 'required',
            'baseimage' => 'required|mimes:jpg,bmp,png'
        ];

        $validator = Validator::make($request->all(), $rules);

        // dd($request->all());

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $inputs = $request->all();

            $inputs['attributes'] = json_encode($request->get('attributes'));

            // Save Base Image
            $fileName = time() . '.' . $request->file('baseimage')->extension();
            $file = $request->file('baseimage')->move(public_path('uploads/product'), $fileName);
            $filepath = 'uploads/product/' . $fileName;
            $inputs['baseimage'] = $filepath;

            $item = Items::create($inputs);

            $item->categories()->attach($inputs['categories']);

            // Multiple Image
            foreach ($request->file('multiple_image') as $image) {
                $fileName = md5(uniqid(rand(), true)) . '.' . $image->extension();
                $file = $image->move(public_path('uploads/product'), $fileName);
                $filepath = 'uploads/product/' . $fileName;

                $imageData = [
                    'item_id' => $item->id,
                    'name' => $fileName,
                    'note' => $filepath,
                ];

                Image::create($imageData);
            }

            return redirect()->to('items')->with('success', 'Item ' . $request->get('name') . ' created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(Items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = Suppliers::all()->pluck('company_name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        $units = [
            'gm' => 'gm', 'kg' => 'kg', 'lb' => 'lb', 'piece' => 'piece', 'dozon' => 'dozon', 'l' => 'l', 'ml' => 'ml',
            'inch' => 'inch', 'foot' => 'foot'
        ];

        $product = Items::with(['categories', 'images'])->find($id);

        $attributes = Attribute::with(['values'])->get();
        // dd($categories,$product->categories->pluck('name', 'id'));

        return view('items.edit', compact('suppliers', 'categories', 'units', 'product', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Items::find($id);
        $inputs = $request->all();

        $inputs['attributes'] = json_encode($request->get('attributes'));

        // dd($request->file('baseimage'));

        // Save Base Image
        if ($request->hasFile('baseimage')) {
            $fileName = time() . '.' . $request->file('baseimage')->extension();
            $file = $request->file('baseimage')->move(public_path('uploads/product'), $fileName);
            $filepath = 'uploads/product/' . $fileName;
            $inputs['baseimage'] = $filepath;
        } else {
            $inputs['baseimage'] = $product->baseimage;
        }

        $product->update($inputs);

        $product->categories()->sync($inputs['categories']);

        // Multiple Image
        if ($request->hasFile('multiple_image')) {
            $product->images()->delete();
            foreach ($request->file('multiple_image') as $image) {
                $fileName = md5(uniqid(rand(), true)) . '.' . $image->extension();
                $file = $image->move(public_path('uploads/product'), $fileName);
                $filepath = 'uploads/product/' . $fileName;

                $imageData = [
                    'item_id' => $product->id,
                    'name' => $fileName,
                    'note' => $filepath,
                ];

                Image::create($imageData);
            }
        }

        return redirect()->to('items')->with('success', 'Item ' . $request->get('name') . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Items::find($id);
        $productName = $product->name;

        if ($product->baseimage && file_exists(public_path($product->baseimage))) {
            unlink(public_path($product->baseimage));
        }

        if ($product->images) {
            foreach ($product->images as $image) {
                if (file_exists(public_path($image->note))) {
                    unlink(public_path($image->note));
                }
            }
        }

        $product->delete();

        return redirect()->to('items')->with('success', 'Item ' . $productName . ' deleted successfully');
    }

    public function GenerateBarcode($id)
    {
        $item_SKU = Items::find($id)->sku;
        return view('items.generatebarcodes', compact('item_SKU'));
    }
    public function attributes()
    {
        return view('items.attributes');
    }
    public function add_attributes(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'value' => 'required'
            ]);
            $name = $request->name;
            $values = $request->value;
            $array_values = explode(',', $values);

            $attribute_name = new Attribute();
            $attribute_name->name = $request->name;
            $attribute_name->save();
            foreach ($array_values as $value) {
                $attribute_value = new AttributeValue();
                $attribute_value->attribute_id = $attribute_name->id;
                $attribute_value->value = $value;
                $attribute_value->save();
            }
            return redirect()->to('items/attributes')->with('success', 'Attribute Added Successfully');
        } else {
            return view('items.addattribute');
        }
    }
    public function update_attributes(Request $request)
    {
        $request->validate([
            'value' => 'required'
        ]);
        try {
            AttributeValue::find($request->id)->update(['value' => $request->value]);
            return redirect()->back()->with('success', 'Attributes Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Something Worng');
        }
    }
    public function update_attributes_name(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        try {
            Attribute::find($request->id)->update(['name' => $request->name]);
            return redirect()->back()->with('success', 'Attributes Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Something Worng');
        }
    }
    public function delete_attributes_name($id)
    {
        try {
            AttributeValue::where('attribute_id', $id)->delete();
            Attribute::find($id)->delete();
            return redirect()->back()->with('success', 'Attributes Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Something Worng');
        }
    }
    public function delete_attributes_value($id)
    {
        try {
            AttributeValue::destroy($id);
            return redirect()->back()->with('success', 'Attributes Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Something Worng');
        }
    }
    public function destroy_items(Request $request)
    {

        foreach ($request->all() as  $value) {
            foreach ($value as  $valu) {
            }
        }
        // $ids = $request->all();
        // for ($i = 0; $i < count($ids); $i++) {
        //     return  $ids[$i];
        // }
        // return json_encode($request->ids());
    }
}
