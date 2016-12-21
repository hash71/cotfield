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
            $table->string('project_id')->unique();
            $table->string('project_name');
            $table->string('buyer_name');
            $table->string('supplier_name');
            $table->string('contract_number');
            $table->date('contract_date');
            $table->string('s_c_origin');
            $table->string('s_c_price');
            $table->string('s_c_payment');
            $table->string('p_i_quantity');
            $table->date('p_i_latest_date_of_lc_opening');
            $table->date('p_i_latest_date_of_shipment');
            $table->string('lc_number');
            $table->date('lc_date_of_issue');
            $table->string('i_p_number');
            $table->date('ip_date');
            $table->date('ip_expiry_date');
            $table->date('sro_date');
            $table->string('lc_port_of_loading');
            $table->date('eta_date');
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
