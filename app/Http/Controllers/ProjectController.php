<?php

namespace App\Http\Controllers;

use App\OptionList;
use App\Project;
use App\SalesReport;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create()
    {
        $project_id = time() . str_random(3);
        return view('project_create', compact('project_id'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $data = $request->except('_token');
        $project_id = $data['project_id'];
        unset($data['project_id']);

        foreach ($data as $key => $value) {
            Project::create([
                'project_id' => $project_id,
                'project_option' => $key,
                'project_value' => $value
            ]);
        }

        $s_c_price = $data['s_c_price'] . " " . OptionList::where('id', $data['s_c_price_unit'])->first()->list;
        $p_i_quantity = $data['p_i_quantity'] . " " . OptionList::where('id', $data['p_i_quantity_unit'])->first()->list;
        $buyer_name = OptionList::where('id', $data['buyer_id'])->first()->list;
        $supplier_name = OptionList::where('id', $data['supplier_id'])->first()->list;
        $lc_port_of_loading = OptionList::where('id', $data['lc_port_of_loading'])->first()->list;

        SalesReport::create([
            'project_id' => $project_id,
            'project_name' => $data['project_name'],
            'buyer_name' => $buyer_name,
            'supplier_name' => $supplier_name,
            'contract_number' => $data['contract_number'],
            'contract_date' => $data['contract_date'],
            'origin' => $data['origin'],
            's_c_price' => $s_c_price,
            's_c_payment' => $data['s_c_payment'],
            'p_i_quantity' => $p_i_quantity,
            'p_i_latest_date_of_lc_opening' => $data['p_i_latest_date_of_lc_opening'],
            'p_i_latest_date_of_shipment' => $data['p_i_latest_date_of_shipment'],
            'lc_number' => $data['lc_number'],
            'lc_date_of_issue' => $data['lc_date_of_issue'],
            'i_p_number' => $data['i_p_number'],
            'ip_date' => $data['ip_date'],
            'ip_expiry_date' => $data['ip_expiry_date'],
            'sro_date' => $data['sro_date'],
            'lc_port_of_loading' => $lc_port_of_loading,
            'eta_date' => $data['s_c_payment'],
        ]);


    }

    public function ajaxCreateOption(\Illuminate\Http\Request $request, $module)
    {

        $valid_option_name = \App\Option::where('name', $module)->first();
        $duplicate = \App\OptionList::where('option', $module)->where('list', $request->input('value'))->first();

        if ($valid_option_name && !$duplicate && $request->input('value')) {
            \App\OptionList::create([
                'option' => $module,
                'list' => $request->input('value')
            ]);
            return 1;
        } else {
            return 0;
        }
    }

    public function ajaxGetOptions($module_name)
    {
        return \App\OptionList::where('option', $module_name)->orderBy('id', 'DESC')->pluck('list', 'id');
    }
}
