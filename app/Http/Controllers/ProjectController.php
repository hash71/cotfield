<?php

namespace App\Http\Controllers;

use App\OptionList;
use App\Project;
use App\ProjectFile;
use App\Report;
use App\SalesReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class ProjectController extends Controller
{
    public function create()
    {
        $project_id = time() . str_random(3);
        return view('project_create_updated', compact('project_id'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        try {
            \DB::transaction(function () use ($request) {

                $data = $request->except('_token');
                $data['eta_date'] = isset($data['eta_date']) ? $data['eta_date'] : "";
                $project_id = $data['project_id'];
                $amendments = [];
                foreach ($data['lc_amendment_day'] as $day) {
                    if ($day != '') {
                        $amendments[] = $day;
                    }
                }
                $lc_amendment_day = json_encode($amendments);
                unset($data['project_id']);
                unset($data['lc_amendment_day']);

                try {
                    $s_c_price = $data['s_c_price'] . " " . OptionList::where('id', $data['s_c_price_unit'])->first()->list;
                } catch (\Exception $e) {
                    $s_c_price = "";
                }
                try {
                    $p_i_quantity = $data['p_i_quantity'] . " " . OptionList::where('id', $data['p_i_quantity_unit'])->first()->list;
                } catch (\Exception $e) {
                    $p_i_quantity = "";
                }
                try {
                    $buyer_name = OptionList::where('id', $data['buyer_id'])->first()->list;
                } catch (\Exception $e) {
                    $buyer_name = "";
                }
                try {
                    $supplier_name = OptionList::where('id', $data['supplier_id'])->first()->list;
                } catch (\Exception $e) {
                    $supplier_name = "";
                }

                try {
                    $s_c_origin = OptionList::where('id', $data['s_c_origin'])->first()->list;
                } catch (\Exception $e) {
                    $s_c_origin = "";
                }

                try {
                    $lc_port_of_loading = OptionList::where('id', $data['lc_port_of_loading'])->first()->list;
                } catch (\Exception $e) {
                    $lc_port_of_loading = "";
                }

                foreach ($data as $key => $value) {
                    Project::create([
                        'project_id' => $project_id,
                        'project_option' => $key,
                        'project_value' => is_array($value) ? json_encode($value) : $value
                    ]);
                }
                Project::create([
                    'project_id' => $project_id,
                    'project_option' => 'lc_amendment_day',
                    'project_value' => $lc_amendment_day
                ]);
                Report::create([
                    'project_id' => $project_id,
                    'user_id' => \Auth::id(),
                    'project_name' => $data['project_name'],
                    'buyer_name' => $buyer_name,
                    'supplier_name' => $supplier_name,
                    'contract_number' => $data['contract_number'],
                    'contract_date' => $data['contract_date'],
                    's_c_origin' => $s_c_origin,
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
                    'eta_date' => is_array($data['eta_date']) ? implode(", ", $data['eta_date']) : $data['eta_date']
                ]);
            });
            session()->flash('project_created_true', 1);
            return redirect('dashboard');
        } catch (\Exception $e) {
//            dd($e);
            session()->flash('project_created_false', 1);
            return redirect('dashboard');
        }


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

    public function edit($project_id)
    {
        if (!Report::where('project_id', $project_id)->first()) {
            $message = "The project you are looking for could not be found";
            return view('errors.503', compact('message'));
        }
        $data = Project::where('project_id', $project_id)->pluck('project_value', 'project_option');
        $option_list = \App\Option::pluck('name')->toArray();

//        dd(json_encode($option_list));

        return view('project_edit', compact('project_id', 'data', 'option_list'));
    }

    public function update(Request $request)
    {
//        dd($request->all());

        try {
            \DB::transaction(function () use ($request) {

                $data = $request->except('_token');
                $data['eta_date'] = isset($data['eta_date']) ? $data['eta_date'] : "";
                $project_id = $data['project_id'];
                $amendments = [];
                foreach ($data['lc_amendment_day'] as $day) {
                    if ($day != '') {
                        $amendments[] = $day;
                    }
                }
                $lc_amendment_day = json_encode($amendments);
                unset($data['project_id']);
                unset($data['lc_amendment_day']);


                try {
                    $s_c_price = $data['s_c_price'] . " " . OptionList::where('id', $data['s_c_price_unit'])->first()->list;
                } catch (\Exception $e) {
                    $s_c_price = "";
                }
                try {
                    $p_i_quantity = $data['p_i_quantity'] . " " . OptionList::where('id', $data['p_i_quantity_unit'])->first()->list;
                } catch (\Exception $e) {
                    $p_i_quantity = "";
                }
                try {
                    $buyer_name = OptionList::where('id', $data['buyer_id'])->first()->list;
                } catch (\Exception $e) {
                    $buyer_name = "";
                }
                try {
                    $supplier_name = OptionList::where('id', $data['supplier_id'])->first()->list;
                } catch (\Exception $e) {
                    $supplier_name = "";
                }
                try {
                    $s_c_origin = OptionList::where('id', $data['s_c_origin'])->first()->list;
                } catch (\Exception $e) {
                    $s_c_origin = "";
                }
                try {
                    $lc_port_of_loading = OptionList::where('id', $data['lc_port_of_loading'])->first()->list;
                } catch (\Exception $e) {
                    $lc_port_of_loading = "";
                }
                Project::where('project_id', $project_id)->delete();
                Report::where('project_id', $project_id)->delete();
                foreach ($data as $key => $value) {
                    Project::create([
                        'project_id' => $project_id,
                        'project_option' => $key,
                        'project_value' => is_array($value) ? json_encode($value) : $value
                    ]);
                }
                Project::create([
                    'project_id' => $project_id,
                    'project_option' => 'lc_amendment_day',
                    'project_value' => $lc_amendment_day
                ]);
                Report::create([
                    'project_id' => $project_id,
                    'user_id' => \Auth::id(),
                    'project_name' => $data['project_name'],
                    'buyer_name' => $buyer_name,
                    'supplier_name' => $supplier_name,
                    'contract_number' => $data['contract_number'],
                    'contract_date' => $data['contract_date'],
                    's_c_origin' => $s_c_origin,
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
                    'eta_date' => is_array($data['eta_date']) ? implode(", ", $data['eta_date']) : $data['eta_date']
                ]);
            });
            session()->flash('project_updated_true', 1);
            return redirect('dashboard');
        } catch (\Exception $e) {
            session()->flash('project_updated_false', 1);
            return redirect('dashboard');
        }


    }

    public function destroy($project_id)
    {
//        dd("delete");
        try {
            \DB::transaction(function () use ($project_id) {
                Project::where('project_id', $project_id)->delete();
                Report::where('project_id', $project_id)->delete();

                $file_ids = ProjectFile::where('project_id', $project_id)->pluck('file_id');
                foreach ($file_ids as $file_id) {
                    $directory = storage_path(env('STORAGE_PATH') . '/' . $file_id);
                    foreach (glob("{$directory}/*") as $file) {
                        unlink($file);
                    }
                    rmdir($directory);
                }
                ProjectFile::where('project_id', $project_id)->delete();
            });
            session()->flash('project_delete_true', 1);
            return redirect('dashboard');
        } catch (\Exception $e) {
            session()->flash('project_delete_false', 1);
            return redirect('dashboard');
        }

    }

//    public function ajax_get_project_details(Request $request)
//    {
//
//        $project_id = $request->get('value');
//
//        $data = Project::where('project_id', $project_id)->pluck('project_value', 'project_option');
//
//        return response()->json($data);
//    }


}
