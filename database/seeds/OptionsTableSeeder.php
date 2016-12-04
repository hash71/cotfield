<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options_name = [
            'project_status',
            'buyer_id',
            'supplier_id',
            's_c_origin',
            's_c_staple_unit',
            's_c_mic_unit',
            's_c_strength_unit',
            's_c_quantity_unit',
            's_c_price_unit',
            's_c_payment',
            'p_i_quantity_unit',
            'lc_type',
            'lc_partial_shipments',
            'lc_transhipment',
            'lc_port_of_loading',
            'lc_port_of_discharge',
            'shipment_type',
            'shipment_port_of_loading',
            'shipment_transshipment_port',
            'shipment_port_of_discharge',
            'controller_weight_finalization_area',
            'controller_weight_type',
            'controller_tear_weight_unit',
            'controller_invoice_weight_unit',
            'controller_landing_weight_unit',
            'q_c_quality_claim_amount_unit',
            'q_c_quality_received_amount_unit',
            'debit_note_received_amount_unit',
            'cc_amount_unit',
            'lc_amendment_charge_amount_unit'

        ];

        foreach ($options_name as $name) {
            \App\Option::create([
                'name' => $name
            ]);

        }
    }
}
