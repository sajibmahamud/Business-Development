<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoilAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soil_admin', function (Blueprint $table) {
            $table->increments('soil_id');
            $table->string('soil_admin_email');
            $table->string('soil_admin_pass');
            $table->string('soil_admin_name');
            $table->string('soil_admin_phone');
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
        Schema::dropIfExists('soil_admin');
    }
}
