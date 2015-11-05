<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermsAndConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms_and_conditions', function (Blueprint $table)
        {
            $table->increments('id');
            $table->enum('user_type', ['customer', 'partner']); //May be int, but int is easy to understand and debugging, so the value would be "client" and "partner"
            $table->smallInteger('serial')->unsigned();                    //serial of this t&c so that serial can easily changed
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('terms_and_conditions');
    }
}
