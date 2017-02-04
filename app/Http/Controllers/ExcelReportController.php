<?php

namespace App\Http\Controllers;

use App\MonthlyExcel;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ExcelReportController extends Controller
{
    //
    public function index()
    {
        if (\Auth::user()->role != 'admin') {
            return redirect('dashboard');
        }
        $importer = MonthlyExcel::where('importer', '<>', '')->select('importer')->distinct()->orderBy('importer')->get();
        $exporter = MonthlyExcel::where('exporter', '<>', '')->select('exporter')->distinct()->orderBy('exporter')->get();
        $exporter_origin = MonthlyExcel::where('exporter_origin', '<>', '')->select('exporter_origin')->distinct()->orderBy('exporter_origin')->get();
        $product_origin = MonthlyExcel::where('product_origin', '<>', '')->select('product_origin')->distinct()->orderBy('product_origin')->get();
        $grade_type = MonthlyExcel::where('grade_type', '<>', '')->select('grade_type')->distinct()->orderBy('grade_type')->get();
        $staple = MonthlyExcel::where('staple', '<>', '')->select('staple')->distinct()->orderBy('staple')->get();
        $mic = MonthlyExcel::where('mic', '<>', '')->select('mic')->distinct()->orderBy('mic')->get();
        $rate_per_lb_usd = MonthlyExcel::where('rate_per_lb_usd', '<>', '')->select('rate_per_lb_usd')->distinct()->orderBy('rate_per_lb_usd')->get();
        $qty_mt = MonthlyExcel::where('qty_mt', '<>', '')->select('qty_mt')->distinct()->orderBy('qty_mt')->get();
        $port = MonthlyExcel::where('port', '<>', '')->select('port')->distinct()->orderBy('port')->get();
        $month = MonthlyExcel::where('month', '<>', '')->select('month')->distinct()->orderBy('month')->get();
        $year = MonthlyExcel::where('year', '<>', '')->select('year')->distinct()->orderBy('year')->get();
        return view('excel_report', compact('importer', 'exporter', 'exporter_origin', 'product_origin', 'grade_type', 'staple', 'mic', 'rate_per_lb_usd', 'qty_mt', 'port', 'month', 'year'));

    }

    public function ajaxExcelReport(Request $request)
    {
        if (\Auth::user()->role != 'admin') {
            return "login as admin";
        }

        $id = MonthlyExcel::pluck('id')->toArray();

        $id1 = $id2 = $id3 = $id4 = $id5 = $id6 = $id7 = $id8 = $id9 = $id10 = $id11 = $id12 = $id;

        if ($request->importer) {
            $id1 = MonthlyExcel::whereIn('importer', $request->importer)->pluck('id')->toArray();
        }
        if ($request->exporter) {
            $id2 = MonthlyExcel::whereIn('exporter', $request->exporter)->pluck('id')->toArray();
        }
        if ($request->exporter_origin) {
            $id3 = MonthlyExcel::whereIn('exporter_origin', $request->exporter_origin)->pluck('id')->toArray();
        }
        if ($request->product_origin) {
            $id4 = MonthlyExcel::whereIn('product_origin', $request->product_origin)->pluck('id')->toArray();
        }
        if ($request->grade_type) {
            $id5 = MonthlyExcel::whereIn('grade_type', $request->grade_type)->pluck('id')->toArray();
        }
        if ($request->staple) {
            $id6 = MonthlyExcel::whereIn('staple', $request->staple)->pluck('id')->toArray();
        }
        if ($request->mic) {
            $id7 = MonthlyExcel::whereIn('mic', $request->mic)->pluck('id')->toArray();
        }
        if ($request->rate_per_lb_usd) {
            $id8 = MonthlyExcel::whereIn('rate_per_lb_usd', $request->rate_per_lb_usd)->pluck('id')->toArray();
        }
        if ($request->qty_mt) {
            $id9 = MonthlyExcel::whereIn('qty_mt', $request->qty_mt)->pluck('id')->toArray();
        }
        if ($request->port) {
            $id10 = MonthlyExcel::whereIn('port', $request->port)->pluck('id')->toArray();
        }
        if ($request->month) {
            $id11 = MonthlyExcel::whereIn('month', $request->month)->pluck('id')->toArray();
        }
        if ($request->year) {
            $id12 = MonthlyExcel::whereIn('year', $request->year)->pluck('id')->toArray();
        }

        $id = array_intersect($id1, $id2, $id3, $id4, $id5, $id6, $id7, $id8, $id9, $id10, $id11, $id12);

//        print_r($ids);
        return Datatables::of(MonthlyExcel::whereIn('id', $id)->get())->make(true);
    }
}
