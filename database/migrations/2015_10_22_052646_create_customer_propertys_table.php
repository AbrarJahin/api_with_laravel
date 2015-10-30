<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerPropertysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_property', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('customer_id')  ->unsigned()  ->index();
            $table->string('house_no',20);
            $table->string('street-address',50);
            $table->string('zip_code',10)->index();
            $table->string('city',20);
            $table->string('state_id',20);
            $table->string('image_url',100);
            $table->timestamp('created_at');

            //Foreign Keys
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('zip_code')->references('zip_code')->on('zip_codes');   //if not in zip_codes table, then create it

            //Group Unique ->Not added because of too long names
            //$table->index(['customer_id', 'house_no', 'street-address', 'zip_code', 'city', 'state_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_property');
    }
}
