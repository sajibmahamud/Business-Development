<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_orders', function (Blueprint $table) {
            $table->increments('o_id');
            $table->string('o_name');
            $table->integer('o_phone');
            $table->string('soil')->nullable();
            $table->string('gass')->nullable();
            $table->string('land')->nullable();
            $table->string('water')->nullable();
            $table->string('tax')->nullable();
            $table->string('o_file');
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
        Schema::dropIfExists('tbl_orders');
    }
}
