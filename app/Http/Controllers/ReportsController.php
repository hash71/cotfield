<?php

namespace App\Http\Controllers;

use App\Report;
use App\SalesReport;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ReportsController extends Controller
{
    public function getSalesReport()
    {
        return view('salesReport');

    }

    public function getReport()
    {
        return view('report');
    }

    public function ajaxSalesReport()
    {
        return Datatables::of(SalesReport::all())->make(true);
    }

    public function ajaxReport()
    {
        return Datatables::of(Report::all())->make(true);
    }
}
