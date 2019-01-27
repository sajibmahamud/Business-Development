<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_admin', function (Blueprint $table) {
            $table->increments('land_id');
            $table->string('land_admin_email');
            $table->string('land_admin_pass');
            $table->string('land_admin_name');
            $table->string('land_admin_phone');
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
        Schema::dropIfExists('land_admin');
    }
}
