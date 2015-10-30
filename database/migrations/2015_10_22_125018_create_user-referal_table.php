<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReferalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user-referal', function (Blueprint $table)
        {
            $table->integer('user_id')  ->unsigned()  ->index();
            $table->integer('new_comer_user_id')  ->unsigned()  ->unique();
            $table->timestamps('created_at');
            //Foreign Keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('new_comer_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user-referal');
    }
}
