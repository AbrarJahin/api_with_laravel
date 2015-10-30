<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerProvidedServicePartnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_provided_service-partner', function (Blueprint $table)
        {
            $table->integer('partner_id')  ->unsigned()  ->index();
            $table->integer('pp_service_id')  ->unsigned()  ->index();    //pp_service_id = partner_provided_service_id

            //Foreign Keys
            $table->foreign('partner_id')->references('id')->on('partners');
            $table->foreign('pp_service_id')->references('id')->on('partner_provided_services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partner_provided_service-partner');
    }
}
