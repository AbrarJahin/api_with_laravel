<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerServiceSchedulingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_service_scheduling', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('partner_id')                       ->unsigned()  ->index();
            $table->integer('scheduled_service_id')             ->unsigned()  ->index();
            $table->enum('is_done', ['yes', 'no'])->default('no');//it is updated by partner to review for ADMIN and ask for customer review
            $table->enum('is_cancelled', ['yes', 'no'])->default('no');
            $table->timestamps();

            //Foreign Keys
            $table->foreign('partner_id')->references('id')->on('partners');
            $table->foreign('scheduled_service_id')->references('id')->on('scheduled_service');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partner_service_scheduling');
    }
}
