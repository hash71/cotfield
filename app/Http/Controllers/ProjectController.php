<?php

namespace App\Http\Controllers;

use App\OptionList;
use App\Project;
use App\ProjectFile;
use App\Report;
use Illuminate\Http\Request;
use Storage;

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
        if (!$request->lc_partial_shipments) {
            session()->flash('partial_shipment_select', 1);
            return redirect('dashboard');
        }

        try {
            \DB::transaction(function () use ($request) {

                $data = $request->except('_token');
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
                //updated code start
                $p_i_quantity = is_numeric($data['p_i_quantity']) ? $data['p_i_quantity'] : 0;
                //updated code end

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

                $s_g_w_c_short_gain_weight_claim_qty = "";

                try {

                    if ($data['shipping_number'] == 0) {

                        $s_g_w_c_short_gain_weight_claim_qty = $data['controller_invoice_weight'] - $data['controller_landing_weight'];

                    } elseif ($data['shipping_number'] > 0) {

                        $s_g_w_c_short_gain_weight_claim_qty = [];

                        for ($i = 0; $i < $data['shipping_number']; $i++) {
                            $s_g_w_c_short_gain_weight_claim_qty[] = $data['controller_invoice_weight'][$i] - $data['controller_landing_weight'][$i];
                        }
                        $s_g_w_c_short_gain_weight_claim_qty = implode(", ", $s_g_w_c_short_gain_weight_claim_qty);
                    }

                } catch (\Exception $e) {
                    dd($e);
                    $s_g_w_c_short_gain_weight_claim_qty = "";
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
                    's_c_payment' => $data['s_c_payment'] ? OptionList::where('id', $data['s_c_payment'])->first()->list : '',
                    'p_i_quantity' => $p_i_quantity,
                    'p_i_latest_date_of_lc_opening' => $data['p_i_latest_date_of_lc_opening'],
                    'p_i_latest_date_of_shipment' => $data['p_i_latest_date_of_shipment'],
                    'lc_number' => $data['lc_number'],
                    'lc_date_of_issue' => $data['lc_date_of_issue'],
                    'lc_date_of_expiry' => $data['lc_date_of_expiry'],
                    'i_p_number' => $data['i_p_number'],
                    'ip_date' => $data['ip_date'],
                    'ip_expiry_date' => $data['ip_expiry_date'],
                    'sro_date' => $data['sro_date'],
                    'lc_port_of_loading' => $lc_port_of_loading,
                    'shipment_date' => is_array($data['shipment_date']) ? implode(", ", $data['shipment_date']) : $data['shipment_date'],
                    'eta_date' => is_array($data['eta_date']) ? implode(", ", $data['eta_date']) : $data['eta_date'],
                    'payment_invoice_payment_date' => is_array($data['payment_invoice_payment_date']) ? implode(", ", $data['payment_invoice_payment_date']) : $data['payment_invoice_payment_date'],
                    'payment_acceptance_date' => is_array($data['payment_acceptance_date']) ? implode(", ", $data['payment_acceptance_date']) : $data['payment_acceptance_date'],
                    's_g_w_c_short_gain_weight_claim_qty' => $s_g_w_c_short_gain_weight_claim_qty,
                    's_g_w_c_amount_received_date' => is_array($data['s_g_w_c_amount_received_date']) ? implode(", ", $data['s_g_w_c_amount_received_date']) : $data['s_g_w_c_amount_received_date'],
                    'q_c_quality_claim_amount' => $data['q_c_quality_claim_amount'],
                    'q_c_amount_received_date' => $data['q_c_amount_received_date'],
                    'cc_amount' => $data['cc_amount']
                ]);
            });
            session()->flash('project_created_true', 1);
            return redirect('dashboard');
        } catch (\Exception $e) {
//            dd($e->getLine());
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
        return \DB::table('option_lists')->where('option', $module_name)->orderBy('list', 'ASC')->select(['list', 'id'])->get();
//        return \App\OptionList::where('option', $module_name)->orderBy('list', 'ASC')->pluck('list', 'id');
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
        if (!$request->lc_partial_shipments) {
            session()->flash('partial_shipment_select', 1);
            return redirect('dashboard');
        }

        try {
            \DB::transaction(function () use ($request) {

                $data = $request->except('_token');
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

                //updated code start
                $p_i_quantity = is_numeric($data['p_i_quantity']) ? $data['p_i_quantity'] : 0;
                //updated code end

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

                $s_g_w_c_short_gain_weight_claim_qty = "";

                try {

                    if ($data['shipping_number'] == 0) {

                        $s_g_w_c_short_gain_weight_claim_qty = $data['controller_invoice_weight'] - $data['controller_landing_weight'];

                    } elseif ($data['shipping_number'] > 0) {

                        $s_g_w_c_short_gain_weight_claim_qty = [];

                        for ($i = 0; $i < $data['shipping_number']; $i++) {
                            $s_g_w_c_short_gain_weight_claim_qty[] = $data['controller_invoice_weight'][$i] - $data['controller_landing_weight'][$i];
                        }
                        $s_g_w_c_short_gain_weight_claim_qty = implode(", ", $s_g_w_c_short_gain_weight_claim_qty);
                    }

                } catch (\Exception $e) {
                    $s_g_w_c_short_gain_weight_claim_qty = "";
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
                    's_c_payment' => $data['s_c_payment'] ? OptionList::where('id', $data['s_c_payment'])->first()->list : '',
                    'p_i_quantity' => $p_i_quantity,
                    'p_i_latest_date_of_lc_opening' => $data['p_i_latest_date_of_lc_opening'],
                    'p_i_latest_date_of_shipment' => $data['p_i_latest_date_of_shipment'],
                    'lc_number' => $data['lc_number'],
                    'lc_date_of_issue' => $data['lc_date_of_issue'],
                    'lc_date_of_expiry' => $data['lc_date_of_expiry'],
                    'i_p_number' => $data['i_p_number'],
                    'ip_date' => $data['ip_date'],
                    'ip_expiry_date' => $data['ip_expiry_date'],
                    'sro_date' => $data['sro_date'],
                    'lc_port_of_loading' => $lc_port_of_loading,
                    'shipment_date' => is_array($data['shipment_date']) ? implode(", ", $data['shipment_date']) : $data['shipment_date'],
                    'eta_date' => is_array($data['eta_date']) ? implode(", ", $data['eta_date']) : $data['eta_date'],
                    'payment_invoice_payment_date' => is_array($data['payment_invoice_payment_date']) ? implode(", ", $data['payment_invoice_payment_date']) : $data['payment_invoice_payment_date'],
                    'payment_acceptance_date' => is_array($data['payment_acceptance_date']) ? implode(", ", $data['payment_acceptance_date']) : $data['payment_acceptance_date'],
                    's_g_w_c_short_gain_weight_claim_qty' => $s_g_w_c_short_gain_weight_claim_qty,
                    's_g_w_c_amount_received_date' => is_array($data['s_g_w_c_amount_received_date']) ? implode(", ", $data['s_g_w_c_amount_received_date']) : $data['s_g_w_c_amount_received_date'],
                    'q_c_quality_claim_amount' => $data['q_c_quality_claim_amount'],
                    'q_c_amount_received_date' => $data['q_c_amount_received_date'],
                    'cc_amount' => $data['cc_amount']
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
                    Storage::disk('s3')->deleteDirectory('cotfield/' . $file_id);
                }
                ProjectFile::where('project_id', $project_id)->delete();
            });
            session()->flash('project_delete_true', 1);
            return redirect('dashboard');
        } catch (\Exception $e) {
            dd($e);
            session()->flash('project_delete_false', 1);
            return redirect('dashboard');
        }

    }

}
