<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('package_id');
            $table->string('fullname');
            $table->string('company_name')->nullable();
            $table->string('department')->nullable();
            $table->string('phone');
            $table->string('fax')->nullable();
            $table->string('email');
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('postal');
            $table->string('country');
            $table->date('ship_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippers');
    }
}
