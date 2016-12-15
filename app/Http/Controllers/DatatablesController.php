<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\Datatables;

class DatatablesController extends Controller
{
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('datatable');
    }

    public function getSalesReport()
    {
        return view('salesReport');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(User::where('id', 1)->get())->make(true);
    }

    public function getSalesReportData()
    {
        Project::all()->pluck('project_id');
        return Datatables::of()->make(true);
    }
}