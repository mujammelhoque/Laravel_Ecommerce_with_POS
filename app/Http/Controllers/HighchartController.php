<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Employees;
// use DB;

class HighchartController extends Controller
{
    public function handleChart(Request $request)
    {
        if ($request->graphid == 2) {
            $userData = Customer::select(\DB::raw("COUNT(*) as count"))
                ->whereBetween('created_at', [$request->startdate, $request->enddate])
                ->groupBy(\DB::raw("Date(created_at)"))
                ->pluck('count');

            $tital = "Customer";

            return view('reports.graphical_reports.customars', compact('userData', 'tital'));
        } elseif ($request->graphid == 4) {
            $userData = Employees::select(\DB::raw("COUNT(*) as count"))
                ->whereBetween('created_at', [$request->startdate, $request->enddate])
                ->groupBy(\DB::raw("Date(created_at)"))
                ->pluck('count');
            $tital = "Employee";

            return view('reports.graphical_reports.customars', compact('userData', 'tital'));
        } elseif ($request->graphid == 11) {
            $customers = Customer::whereBetween('created_at', [$request->startdate, $request->enddate])
                ->get();

            return view('reports.graphical_reports.summaryreport', compact('customers'));
        } elseif ($request->graphid == 13) {
            $employees = Employees::whereBetween('created_at', [$request->startdate, $request->enddate])
                ->get();

            return view('reports.graphical_reports.summaryreport', compact('employees'));
        }
    }
}
