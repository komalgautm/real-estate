<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('user_id');
            $table->string('area_id');
            $table->string('building_id');
            $table->string('apartment_id');
            $table->string('payment_mode');
            $table->integer('cheque_no');
            $table->string('cheque_status');
            $table->integer('amount');
            $table->integer('current_month');
            $table->string('maintenance_type');
            $table->string('description');
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
        Schema::dropIfExists('maintenance');
    }
}
