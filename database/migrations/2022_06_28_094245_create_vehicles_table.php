<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('owner_name');
            $table->string('vehicle_brand');
            $table->string('vehicle_model');
            $table->string('vehicle_image');
            $table->string('fuel_type');
            $table->string('plate_number');
            $table->dateTime('plate_expiry');
            $table->string('weight');
            $table->string('mileage');
            $table->dateTime('last_inspection');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
