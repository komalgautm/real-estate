<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_building', function (Blueprint $table) {
            $table->id();
            $table->string('city_id');
            $table->string('area_id');
            $table->string('language_id');
            $table->string('code');
            $table->string('building_name');
            $table->string('no_of_floors');
            $table->string('no_of_apartments');
            $table->string('no_of_apartment_floorwise');
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
        Schema::dropIfExists('tbl_building');
    }
}
