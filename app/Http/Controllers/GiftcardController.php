<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Giftcard;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class GiftcardController extends Controller
{
    public function __construct()
    {
        $this->middleware('onlyadmin');
    }
    public function index()
    {
        // if (Auth::user()->role == '5') {
        //     return redirect()->back()->with('warning', 'You have No Permission');
        // }
        $gift_cards = Giftcard::with('customer')->orderBy('id', 'DESC')->get();
        return view('giftcards.index', compact('gift_cards'));
    }

    public function newgiftcards()
    {
        return view('giftcards.new');
    }
    public function updategiftcards()
    {
        return view('giftcards.update');
    }
    public function customer_search(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $items = Customer::orderby('name', 'asc')->select('id', 'name')->limit(5)->get();
        } else {
            $items = Customer::orderby('first_name', 'asc')->select('id', 'first_name', 'last_name', 'phone')
                ->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->limit(5)->get();
        }
        $response = array();
        foreach ($items as $item) {
            $response[] = array('search' => $request->search, 'name' => $item->first_name . ' ' . $item->last_name, 'value' => $item->first_name . ' ' . $item->last_name, 'label' => $item->first_name . ' ' . $item->last_name, 'id' => $item->id);
        }
        return response()->json($response);
    }
    public function store(Request $request)
    {
        $customer_id = $request->employee_id;
        $expire_date = $request->date;
        $value = $request->value;
        $card = Giftcard::orderBy('id', 'desc')->first();
        if ($card) {
            $card_number = $card->card_number + 1;
        } else {
            $card_number = 1010101010;
        }

        $gift_catd = new Giftcard();
        $gift_catd->customer_id = $request->employee_id;
        $gift_catd->expire_date = $request->date;
        $gift_catd->value = $request->value;
        $gift_catd->card_number = $card_number;
        $gift_catd->created_at = Carbon::now();
        $gift_catd->save();
        return redirect()->to('/giftcards')->with('success', 'Card Added. your card Number: ' . $gift_catd->card_number . '');

        //        $img = Image::make(public_path('public/uploads/gift_card/fsad.jpg'));
        //        $img->text("12132121", 120, 100, function($font) {
        //            $font->file(public_path('public/uploads/gift_card/CARDC___.TTF'));
        //            $font->size(28);
        //            $font->color('#4285F4');
        //            $font->align('center');
        //            $font->valign('bottom');
        //            $font->angle(0);
        //        });
        //        $img->save(public_path('public/uploads/gift_card/'));
        //        return "OK";

    }
    public function edit($id)
    {
        $gift_card = Giftcard::with('customer')->where('id', $id)->first();
        return view('giftcards.edit', compact('gift_card'));
    }
    public function update(Request $request)
    {
        if ($request->employee_id) {
            $customer = $request->employee_id;
        } else {
            $customer = $request->id;
        }
        $data = [
            'customer_id' => $customer,
            'expire_date' => $request->date,
            'value' => $request->value,
            'updated_at' => Carbon::now()
        ];
        Giftcard::where('customer_id', $customer)->update($data);
        return redirect()->back()->with('success', 'Gift Card Updated Successfully');
    }
    public function delete($id)
    {
        Giftcard::destroy($id);
        return redirect()->back()->with('success', 'Gift Deleted Successfully');
    }
}
