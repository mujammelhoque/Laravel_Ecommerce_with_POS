<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Items;
use App\Models\ReceivingsItems;
use App\Models\Reports;
use App\Models\Sales;
use App\Models\SalesItem;
use App\Models\Suppliers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function graphical_summary(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $startdate= Carbon::parse($request->startdate)->format('Y-m-d');
            $enddate= Carbon::parse($request->enddate)->format('Y-m-d');
            // graphical_employees  graphical_sales graphical_suppliers graphical_items
            // echo $request->segment(2);
           if ($request->segment(2) == 'graphical_sales') {
            $userData = Sales::select(DB::raw("COUNT(*) as count"))
            ->whereBetween('created_at', [$request->startdate, $request->enddate])
            ->groupBy(DB::raw("Date(created_at)"))
            ->pluck('count');
            $tital = "Sales";
            $name= "New Sales";
           }if ($request->segment(2) == 'graphical_items') {
            $userData = Items::select(DB::raw("COUNT(*) as count"))
            ->whereBetween('created_at', [$request->startdate, $request->enddate])
            ->groupBy(DB::raw("Date(created_at)"))
            ->pluck('count');
            $tital = "Items";
            $name= "New Items";
           }
           if ($request->segment(2) == 'graphical_categories') {
            $userData = Category::select(DB::raw("COUNT(*) as count"))
            ->whereBetween('created_at', [$request->startdate, $request->enddate])
            ->groupBy(DB::raw("Date(created_at)"))
            ->pluck('count');
            $tital = "Categories";
            $name= "New Categories";
           }
           if ($request->segment(2) == 'graphical_suppliers') {
            $userData = Suppliers::select(DB::raw("COUNT(*) as count"))
            ->whereBetween('created_at', [$request->startdate, $request->enddate])
            ->groupBy(DB::raw("Date(created_at)"))
            ->pluck('count');
            $tital = "Suppliers";
            $name= "New Suppliers";
           }
           return view('reports.graphical_reports.summaryfinalreport',compact('userData', 'tital','name','startdate','enddate'));
        }else{

            return view('reports.graphical_summary_categories');
        }
    }
    public function graphical_summary_sales($url, $startDate, $endDate, $saleType, $locationId)
    {
        $data = [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'saleType' => $saleType,
            'location' => $locationId
        ];
        return view('receiving.graphical', compact('data'));
    }
    public function summaryList($id)
    {
        return view('reports.graphical_summary_categories');
    }
    public function detailed(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $start_date = Carbon::parse($request->startdate)
                ->toDateTimeString();
            $end_date = Carbon::parse($request->enddate)
                ->toDateTimeString();
            if ($request->segment(1) ==  'reports' && $request->segment(2) ==  'detailed_taxes') {
                $sales_items = SalesItem::with('item', 'sales')->whereBetween('created_at', [$start_date, $end_date])->get();
            } elseif ($request->segment(1) ==  'reports' && $request->segment(2) ==  'detailed_receivings') {
                $sales_items = ReceivingsItems::with('item')->whereBetween('created_at', [$start_date, $end_date])->get();
            }
            return view('reports.details_final_report', compact('sales_items', 'start_date', 'end_date'));
        }
        return view('reports.details');
    }
    public function specific($id)
    {
        return view('reports.graphical_summary_categories');
    }
    public function inventory(Request $request, $id)
    {
        if ($request->segment(2) == 'inventory_summary') {
            $items = Items::orderBy('quantity', 'DESC')->get();
        }
        if ($request->segment(2) == 'inventory_low') {
            $items = Items::where('quantity', '<', 10)->get();

        }
        
        return view('reports.low_inventory', compact('items'));
        // return view('reports.download_low', compact('items'));
    }
    public function export()
    {
        return view('reports.testingreport');
    }
}
