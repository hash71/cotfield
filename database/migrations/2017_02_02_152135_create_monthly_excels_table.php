<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyExcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_excels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('importer');
            $table->string('exporter');
            $table->string('exporter_origin');
            $table->string('product_origin');
            $table->string('grade_type');
            $table->string('staple');
            $table->string('mic');
            $table->double('rate_per_lb_usd');
            $table->integer('qty_mt');
            $table->string('port');
            $table->integer('month');
            $table->integer('year');
            $table->integer('user_id');
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
        Schema::dropIfExists('monthly_excels');
    }
}
