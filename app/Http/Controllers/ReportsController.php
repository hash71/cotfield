<?php

namespace App\Http\Controllers;

use App\Report;
use App\SalesReport;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ReportsController extends Controller
{
//    public function getSalesReport()
//    {
//        return view('salesReport');
//
//    }

    public function getReport()
    {
//        return view('report');
        return view('report_new');
    }

//    public function ajaxSalesReport()
//    {
//        return Datatables::of(SalesReport::all())->make(true);
//    }

    public function ajaxReport()
    {
        $role = \Auth::user()->role;

        if (request('select') && request('from') && request('to')) {
            if ($role == 'basic') {
                return Datatables::of(
                    Report::where('user_id', \Auth::id())
                        ->whereBetween(request('select'), [request('from'), request('to')])
                        ->get()
                )->make(true);
            }
            return Datatables::of(
                Report::whereBetween(request('select'), [request('from'), request('to')])
                    ->get()
            )->make(true);

        } else {
            if ($role == 'basic') {
                return Datatables::of(Report::where('user_id', \Auth::id())->get())->make(true);
            }
            return Datatables::of(Report::all())->make(true);
        }

    }
}
