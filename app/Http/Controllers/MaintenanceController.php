<?php

namespace App\Http\Controllers;

use App\Project;
use App\Report;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function mt()
    {
        $p_i_quantity = Report::pluck('p_i_quantity');

        foreach ($p_i_quantity as $quantity) {
            if ($quantity == '') {
                Report::where('p_i_quantity', $quantity)->update([
                    'p_i_quantity' => 0
                ]);
            } else {
                $updated_quantity = explode(' ', $quantity);
                Report::where('p_i_quantity', $quantity)->update([
                    'p_i_quantity' => $updated_quantity[0]
                ]);
            }
        }
    }

    public function updates_on_demand_for_report()
    {

        $ids = Report::pluck('project_id')->toArray();

        $fields = [
            'lc_date_of_expiry',
            'shipment_date',
            'payment_invoice_payment_date',
            'payment_acceptance_date',
            's_g_w_c_amount_received_date',
            'q_c_quality_claim_amount',
            'q_c_amount_received_date',
            'cc_amount'
        ];
        $multiples = [
            'shipment_date',
            'payment_invoice_payment_date',
            'payment_acceptance_date',
            's_g_w_c_amount_received_date'
        ];


//

        foreach ($ids as $id) {

            $shipping_number = Project::where('project_id', $id)->where('project_option', 'shipping_number')->first()->project_value;

            foreach ($fields as $field) {

                $data = Project::where('project_id', $id)
                    ->where('project_option', $field)
                    ->first()
                    ->project_value;

                if ($shipping_number && in_array($field, $multiples)) {//if multiple shipment then apply this for only multiple fields like controller, shortgain not single fields
                    $data = json_decode(stripslashes($data));
                }


                Report::where('project_id', $id)
                    ->update([
                        $field => is_array($data) ? implode(", ", $data) : $data
                    ]);

            }


            $controller_invoice_weight = Project::where('project_id', $id)->where('project_option', 'controller_invoice_weight')->first()->project_value;
            $controller_landing_weight = Project::where('project_id', $id)->where('project_option', 'controller_landing_weight')->first()->project_value;

            $s_g_w_c_short_gain_weight_claim_qty = "";

            if ($shipping_number == 0) {

                $s_g_w_c_short_gain_weight_claim_qty = (is_numeric($controller_invoice_weight) ? $controller_invoice_weight : 0) - (is_numeric($controller_landing_weight) ? $controller_landing_weight : 0);
                if ($s_g_w_c_short_gain_weight_claim_qty == 0) {
                    $s_g_w_c_short_gain_weight_claim_qty = 0;
                } else {
                    $s_g_w_c_short_gain_weight_claim_qty = number_format($s_g_w_c_short_gain_weight_claim_qty, 3, '.', '');
                }


            } else if ($shipping_number > 0) {

                $controller_invoice_weight = json_decode(stripslashes($controller_invoice_weight));
                $controller_landing_weight = json_decode(stripslashes($controller_landing_weight));
                $s_g_w_c_short_gain_weight_claim_qty = [];

                for ($i = 0; $i < $shipping_number; $i++) {
                    try {
                        $dif = ((is_numeric($controller_invoice_weight[$i]) ? $controller_invoice_weight[$i] : 0) - (is_numeric($controller_landing_weight[$i]) ? $controller_landing_weight[$i] : 0));
                        $s_g_w_c_short_gain_weight_claim_qty[] = ($dif == 0) ? 0 : number_format($dif, 3, '.', '');
                    } catch (\Exception $e) {
                        dd($e);
                    }
                }
                $s_g_w_c_short_gain_weight_claim_qty = implode(", ", $s_g_w_c_short_gain_weight_claim_qty);
            }
            Report::where('project_id', $id)
                ->update([
                    's_g_w_c_short_gain_weight_claim_qty' => $s_g_w_c_short_gain_weight_claim_qty
                ]);
        }
    }
}
