<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrequencyCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frequency-customer', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('customer_id')  ->unsigned()  ->index();
            $table->integer('frequency_id')  ->unsigned()  ->index();
            $table->tinyInteger('is_enabled');              //Nothing would be deleted from this table
            $table->timestamps();   //updated_at = time of disabling

            //Foreign Keys
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('frequency_id')->references('id')->on('request_frequency');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('frequency-customer');
    }
}
