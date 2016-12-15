<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_reports', function (Blueprint $table) {
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
        Schema::dropIfExists('sales_reports');
    }
}
