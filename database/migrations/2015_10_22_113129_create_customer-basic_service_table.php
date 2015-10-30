<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerBasicServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer-basic_service', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('customer_id')  ->unsigned()  ->index();
            $table->integer('property_id')  ->unsigned()  ->index();
            $table->float('money_payable');
            //basic_service table not needed because basic service is only one
            $table->tinyInteger('is_enabled');              //Nothing would be deleted from this table
            $table->timestamps();   //updated_at = time of disabling

            //Foreign Keys
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('property_id')->references('id')->on('customer_property');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer-basic_service');
    }
}
