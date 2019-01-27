<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGassAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gass_admin', function (Blueprint $table) {
            $table->increments('gass_id');
            $table->string('gass_admin_email');
            $table->string('gass_admin_pass');
            $table->string('gass_admin_name');
            $table->string('gass_admin_phone');
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
        Schema::dropIfExists('gass_admin');
    }
}
