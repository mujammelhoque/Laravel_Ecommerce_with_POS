<?php

namespace App\Http\Controllers;

use App\Models\Storeconfig;
use Illuminate\Http\Request;
// use App\Http\Requests\StoreConfigRequest;

class StoreconfigController extends Controller
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
        $storeconf = Storeconfig::all();
        $key = [];
        $val = [];
        foreach ($storeconf as $value) {
            array_push($key, $value->key);
            array_push($val, $value->value);
        }
        $storedata = array_combine($key, $val);
        return view('/storeconfig.index', compact('storedata'));
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
    // public function store(StoreConfigRequest $request)
    public function store(Request $request)
    {

        $requestall = $request->all();
        if ($request->hasFile('companylogo')) {
            $file = $request->file('companylogo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/logo/'), $fileName);
        }


        try {

            foreach ($requestall as $key => $value) {
                if ($key == '_token') {
                    continue;
                }
                if ($key == 'companylogo') {
                    $value = $fileName;
                }
                Storeconfig::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }

            return redirect()->route('storeconfig')
                ->with('success', 'Your data successfully inserted');
        } catch (\Exception $e) {

            return redirect()->route('storeconfig')
                ->with('fail', 'something wrong');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Storeconfig  $storeconfig
     * @return \Illuminate\Http\Response
     */
    public function show(Storeconfig $storeconfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Storeconfig  $storeconfig
     * @return \Illuminate\Http\Response
     */
    public function edit(Storeconfig $storeconfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Storeconfig  $storeconfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Storeconfig $storeconfig)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Storeconfig  $storeconfig
     * @return \Illuminate\Http\Response
     */
    // public function delete_logo($id)
    // {
    //     return $id;
    // }

}
