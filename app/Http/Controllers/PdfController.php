<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\SalesItem;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function index($id)
    {
        $cus_sale = Sales::with('customer', 'employee')->where('id', $id)->first();
        $items = SalesItem::with('item')->where('sales_id', $id)->get();
        return view('sales.pdf', compact('cus_sale', 'items'));
    }
}
