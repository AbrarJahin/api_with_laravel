<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerExtraServicePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer-extra_service_payment', function (Blueprint $table)
        {
            $table->integer('scheduled_service_id')  ->unsigned()  ->index();
            $table->integer('customer_id')  ->unsigned()  ->index();
            $table->integer('ces_id')  ->unsigned()  ->index();     //cbs_id = customer-extra_service_id
            $table->timestamps();

            //Foreign Keys
            $table->foreign('scheduled_service_id')->references('id')->on('scheduled_service');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('ces_id')->references('id')->on('customer-extra_service');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer-extra_service_payment');
    }
}
