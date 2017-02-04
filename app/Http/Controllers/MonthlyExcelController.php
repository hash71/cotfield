<?php

namespace App\Http\Controllers;

use App\MonthlyExcel;
use Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class MonthlyExcelController extends Controller
{
    //
    public function index()
    {
        if (\Auth::user()->role != 'admin') {
            return redirect('dashboard');
        }
        return view('monthly_excel_upload');
    }

    public function getExcelReport()
    {
        if (\Auth::user()->role != 'admin') {
            return redirect('dashboard');
        }
        return view('excel_report');
    }

    public function delete()
    {
        if (\Auth::user()->role != 'admin') {
            return redirect('dashboard');
        }
        return view('monthly_excel_delete');
    }

    public function destroy(Request $request)
    {
        if (\Auth::user()->role != 'admin') {
            return redirect('dashboard');
        }
        $data = explode('-', $request->monthly_excel);

        try {
            $rows = \DB::transaction(function () use ($data) {
                $rows = MonthlyExcel::where('month', (int)$data[1])->where('year', (int)$data[0])->delete();
                return $rows;
            });
            if ($rows == 0) $rows = "Zero";
            session()->flash('monthly_excel_delete_success', $rows);
            return redirect('excel_report')->with('rows', $rows);
        } catch (\Exception $e) {
            session()->flash('monthly_excel_delete_fail', 1);
            return redirect('excel_report');
        }

    }

    public function store(\Illuminate\Http\Request $request)
    {

        $mime = $request->file('monthly_excel')->getMimeType();
        if (!$mime === 'application/vnd.ms-excel' && !$mime === "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
            session()->flash('monthly_excel_file_format', 1);
            return redirect('excel_report');
        }
        try {
            \DB::transaction(function () use ($request) {
                $rows = Excel::load($request->file('monthly_excel'))->get()->first();
                foreach ($rows as $row) {
                    \App\MonthlyExcel::create([
                        "importer" => $row->importer,
                        "exporter" => $row->exporter,
                        "exporter_origin" => $row->exporter_origin,
                        "product_origin" => $row->product_origin,
                        "grade_type" => $row->grade_type,
                        "staple" => $row->staple,
                        "mic" => $row->mic,
                        "rate_per_lb_usd" => $row->rate_per_lb_usd,
                        "qty_mt" => $row->qty_mt,
                        "port" => $row->port,
                        "month" => $row->month,
                        "year" => $row->year,
                        "user_id" => Auth::id()
                    ]);
                }
            });
            session()->flash('excel_success_true', 1);
            return redirect('excel_report');
        } catch (\Exception $e) {
//            dd($e);
            session()->flash('excel_success_false', 1);
            return redirect('excel_report');
        }
    }
}
