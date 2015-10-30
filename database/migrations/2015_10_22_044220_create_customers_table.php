<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')  ->unsigned()  ->index();
            $table->string('neighbourhood');
            $table->string('email',30)  ->unique();
            $table->tinyInteger('is_email_verified');   //true=1, false=0
            $table->string('stripe_id',60)  ->unique();

            //Foreign Keys
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
