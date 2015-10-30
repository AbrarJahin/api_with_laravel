<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerAvailablityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_availablity', function (Blueprint $table)
        {
            $table->integer('partner_id',false)     ->unsigned()  ->index();
            $table->integer('day_id',false,1)       ->unsigned()  ->index();
            $table->integer('time_id',false,2)      ->unsigned()  ->index();

            //Foreign Keys
            $table->foreign('partner_id')  ->references('id')->on('partners');
            $table->foreign('day_id')  ->references('id')->on('service_day');
            $table->foreign('time_id')  ->references('id')->on('service_time');

            //Unique
            $table->index(['partner_id', 'day_id', 'time_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partner_availablity');
    }
}
