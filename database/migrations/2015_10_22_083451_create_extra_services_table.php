<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_provided_services', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('extra_service_name',40)->unique();
            $table->integer('service_money_value',false,5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('extra_provided_services');
    }
}
