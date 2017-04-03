<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->string('lc_date_of_expiry');
            $table->string('shipment_date');
            $table->string('payment_invoice_payment_date');
            $table->string('payment_acceptance_date');
            $table->string('s_g_w_c_short_gain_weight_claim_qty');
            $table->string('s_g_w_c_amount_received_date');
            $table->string('q_c_quality_claim_amount');
            $table->string('q_c_amount_received_date');
            $table->string('cc_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            //
        });
    }
}
