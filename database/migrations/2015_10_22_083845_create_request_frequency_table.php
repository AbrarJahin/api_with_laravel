<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestFrequencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_frequency', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('request_frequency_name',40)->unique();
            $table->integer('request_frequency_value',false,5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('request_frequency');
    }
}
