<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        for ($i = 1; $i <= 50; $i++) {
            $elements = [
                'project_name',
                'project_status',
                'buyer_id',
                'supplier_id',
                's_c_origin',
                's_c_crop_year',
                's_c_type',
                's_c_color_grade',
                's_c_staple',
                's_c_staple_unit',
                's_c_mic',
                's_c_mic_unit',
                's_c_strength',
                's_c_strength_unit',
                's_c_quantity',
                's_c_quantity_unit',
                's_c_price',
                's_c_price_unit',
                's_c_commission_rate',
                's_c_shipment',
                's_c_payment',
                's_c_latest_date_of_lc_opening',
                'upload_sales_confirmation',
                'contract_number',
                'contract_date',
                'upload_contract_copy',
                'p_i_number',
                'p_i_quantity',
                'p_i_quantity_unit',
                'pi_date',
                'last_date_of_lc_opening',
                'last_date_of_shipment',
                'i_p_number',
                'ip_date',
                'ip_expiry_date',
                'sro_date',
                'upload_ip_copy',
                'upload_sro_copy',
                'lc_number',
                'date_of_issue',
                'date_of_expiry',
                'lc_type',
                'lc_opening_bank',
                'lc_receiver_bank',
                'lc_partial_shipments',
                'lc_transhipment',
                'lc_port_of_loading',
                'lc_port_of_discharge',
                'latest_date_of_shipment',
                'lc_amendment_day',
                'upload_lc_copy',
                'upload_amendment_copy',
                'shipment_date',
                'shipment_type',
                'shipment_shipping_line',
                'shipment_vessel_name',
                'shipment_bill_of_lading',
                'shipment_no_of_containers',
                'shipment_no_of_bales',
                'shipment_port_of_loading',
                'transshipment_date',
                'shipment_transshipment_port',
                'shipment_port_of_discharge',
                'eta_date',
                'shipment_advice',
                'nn_commercial_invoice_no',
                'nn_commercial_invoice_date',
                'courier_date',
                'nn_dhl_courier_name',
                'nn_dhl_courier_details',
                'upload_nn_documents',
                'payment_invoice_payment_date',
                'payment_acceptance_date',
                'payment_maturity_due_date',
                'invoice_upload_payment_copy',
                'upload_acceptance_copy',
                'controller_name',
                'controller_weight_finalization_area',
                'controller_weight_type',
                'controller_tear_weight',
                'controller_tear_weight_unit',
                'controller_invoice_weight',
                'controller_invoice_weight_unit',
                'controller_landing_weight',
                'controller_landing_weight_unit',
                'upload_controller_documents',
                's_g_w_c_short_gain_weight_claim_qty',
                's_g_w_c_amount_received_date',
                's_g_w_c_received_account_number',
                's_g_w_c_payment_mode',
                's_g_w_c_remarks',
                's_g_w_c_upload_claim_letter',
                'short_gain_payment_copy',
                'q_c_quality_claim_date',
                'q_c_quality_claim_amount',
                'q_c_quality_claim_amount_unit',
                'q_c_quality_received_amount',
                'q_c_quality_received_amount_unit',
                'q_c_approved_claim_amount',
                'q_c_amount_received_date',
                'q_c_received_account_number',
                'q_c_payment_mode',
                'upload_claim_letter',
                'upload_payment_copy',
                'debit_note_number',
                'debit_note_date',
                'debit_note_received_amount',
                'debit_note_received_amount_unit',
                'debit_note_amount_received_date',
                'debit_note_received_account_number',
                'debit_note_payment_mode',
                'upload_letter',
                'debit_note_remarks',
                'debit_upload_payment_copy',
                'cc_lc_opening_date',
                'cc_actual_lc_opening_date',
                'cc_no_of_days_late',
                'cc_amount',
                'cc_amount_unit',
                'cc_payment_mode',
                'cc_remarks',
                'upload_carrying_copy',
                'lc_amendment_charge_amount',
                'lc_amendment_charge_amount_unit',
                'lc_amendment_charge_payment_mode',
                'remarks_text',
                'all_mail_attachement'
            ];
            $project_id = time() . str_random(5);
            foreach ($elements as $element) {

                if (strpos($element, 'date') !== false) {

                    $value = $faker->date('Y-m-d');
                } else {
                    $value = $faker->name;
                }

                \App\Project::create([
                    'project_id' => $project_id,
                    'project_option' => $element,
                    'project_value' => $value
                ]);
            }
        }


    }
}
