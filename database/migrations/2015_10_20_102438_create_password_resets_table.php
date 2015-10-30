<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table)
        {
            $table->string('login_name',15)         ->index();
            $table->string('password_reset_token')  ->unique();
            $table->timestamp('created_at');
            $table->tinyInteger('is_valid');    //if email link is clicked, then it will become invalid

            //Foreign Keys
            $table->foreign('login_name')->references('login_name')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('password_resets');
    }
}
