<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_auth', function (Blueprint $table)
        {
            $table->integer('user_id')  ->unsigned() ->unique();
            $table->string('access_token', 150);                    //Access token length = 150
            $table->string('ip', 20);
            $table->timestamps();
            $table->dateTime('expires_on');

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
        Schema::drop('api_auth');
    }
}
