<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('first_name',15);
            $table->string('last_name',15);
            $table->string('login_name',15)  ->index();
            $table->string('password', 60);
            $table->string('user_type',10);    //May be int, but int is easy to understand and debugging, so the value would be "client", "partner", "admin"
            $table->string('referal_code',60)->unique();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}