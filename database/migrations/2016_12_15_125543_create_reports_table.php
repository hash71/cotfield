<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_id');
            $table->string('project_name');
            $table->string('buyer_name');
            $table->string('supplier_name');
            $table->string('contract_number');
            $table->string('contract_date');
            $table->string('origin');
            $table->string('s_c_price');
            $table->string('s_c_payment');
            $table->string('p_i_quantity');
            $table->string('p_i_latest_date_of_lc_opening');
            $table->string('p_i_latest_date_of_shipment');
            $table->string('lc_number');
            $table->string('lc_date_of_issue');
            $table->string('i_p_number');
            $table->string('ip_date');
            $table->string('ip_expiry_date');
            $table->string('sro_date');
            $table->string('lc_port_of_loading');
            $table->string('eta_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
