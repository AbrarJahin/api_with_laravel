<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message', function (Blueprint $table)
        {
            $table->integer('from_user_id')  ->unsigned()  ->unique();
            $table->integer('to_user_id')  ->unsigned()  ->unique();
            $table->enum('is_seen', array('yes', 'no'))->default('no');
            $table->string('subject');
            $table->longText('message');
            $table->timestamps();

            //Foreign Keys
            $table->foreign('from_user_id')->references('id')->on('users');
            $table->foreign('to_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('message');
    }
}
