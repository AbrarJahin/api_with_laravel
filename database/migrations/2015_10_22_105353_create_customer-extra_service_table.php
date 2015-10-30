<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerExtraServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer-extra_service', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('customer_id')  ->unsigned()  ->index();
            $table->integer('property_id')  ->unsigned()  ->index();
            $table->float('money_payable');
            $table->integer('extra_service_id')  ->unsigned()  ->index();
            $table->tinyInteger('is_enabled');              //Nothing would be deleted from this table
            $table->timestamps();   //updated_at = time of disabling

            //Foreign Keys
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('property_id')->references('id')->on('customer_property');
            $table->foreign('extra_service_id')->references('id')->on('extra_provided_services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer-extra_service');
    }
}
