<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuppliersRequest;
use App\Models\Suppliers;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class SuppliersController extends Controller
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
        $suppliers = Suppliers::orderBy('id', 'DESC')->get();
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuppliersRequest $request)
    {
        //        dd($request->except(['_token','_method']));
        try {
            Suppliers::insert($request->except(['_token', '_method']));
            return redirect()->back()->with('success', 'Suppliers Successfully Inserted');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Something Wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function show(Suppliers $suppliers)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = Suppliers::find($id);
        return view('suppliers.edit', compact('suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function update(SuppliersRequest $request, $id)
    {
        //        dd($request->except(['_method','_token','id']));
        try {
            Suppliers::find($id)->update($request->except(['_method', '_token']));
            return redirect()->to('/suppliers')->with('success', "suppliers successfully Updated");
        } catch (Exception $e) {
            return redirect()->to('/suppliers')->with('fail', "Something Wrong");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suppliers $suppliers)
    {
        //
    }
}
