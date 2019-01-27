<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_admin', function (Blueprint $table) {
            $table->increments('tax_id');
            $table->string('tax_admin_email');
            $table->string('tax_admin_pass');
            $table->string('tax_admin_name');
            $table->string('tax_admin_phone');
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
        Schema::dropIfExists('tax_admin');
    }
}
