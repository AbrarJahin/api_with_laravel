<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('street_address',50);
            $table->string('city',15);
            $table->integer('user_id')              ->unsigned()  ->index();    //Both have address, so user_id is used
            $table->integer('state_id',false,5)     ->index();
            $table->string('zip_code',10)->index();

            //Foreign Keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('zip_code')->references('zip_code')->on('zip_codes');   //if not in zip_codes table, then create it
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('address');
    }
}
