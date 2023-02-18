<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->integer('staff_id');
            $table->integer('user_id');
            $table->string('area_id');
            $table->string('building_id');
            $table->string('appartment_id');
            $table->string('payment_mode');
            $table->integer('cheque_no');
            $table->integer('amount');
            $table->integer('current_month');
            $table->string('cheque_status');
            $table->integer('payment_type');
            $table->integer('status');
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
        Schema::dropIfExists('payment');
    }
}
