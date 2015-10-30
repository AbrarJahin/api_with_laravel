<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount', function (Blueprint $table)
        {
            $table->string('discount_code',15)      ->unique();
            $table->tinyInteger('is_enabled');             //No data will be ever deleted from here
            $table->integer('discount_money_value',false,5);
            $table->timestamp('created_at');
            $table->dateTime('ending_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('discount');
    }
}
