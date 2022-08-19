<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_options', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('package_id');
            $table->string('dropoff_type')->nullable();
            $table->string('destination_is')->nullable();
            $table->string('service');
            $table->string('signature_option')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_options');
    }
}
