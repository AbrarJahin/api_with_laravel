<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcceptableScheduledServiceTable extends Migration
{
    /**
     * Run the migrations.
     * Table name - 'partner_acceptable_scheduled_service'
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_acc_ss', function (Blueprint $table)
        {
            $table->integer('scheduled_service_id')  ->unsigned();
            $table->integer('partner_id')  ->unsigned();
            $table->enum('is_acepted', array('yes', 'no'))->default('no');
            $table->timestamps();

            //Foreign Keys
            $table->foreign('scheduled_service_id')->references('id')->on('scheduled_service');
            $table->foreign('partner_id')->references('id')->on('partners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partner_acc_ss');
    }
}
