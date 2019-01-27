<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaterAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_admin', function (Blueprint $table) {
            $table->increments('water_id');
            $table->string('water_admin_email');
            $table->string('water_admin_pass');
            $table->string('water_admin_name');
            $table->string('water_admin_phone');
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
        Schema::dropIfExists('water_admin');
    }
}
