<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblConfirmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_confirm', function (Blueprint $table) {
            $table->increments('confirm_id');
            $table->string('c_message');
            $table->integer('o_id');
            $table->string('c_soil')->nullable();
            $table->string('c_gass')->nullable();
            $table->string('c_land')->nullable();
            $table->string('c_water')->nullable();
            $table->string('c_tax')->nullable();
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
        Schema::dropIfExists('tbl_confirm');
    }
}
