<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFbloginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Should follow this - http://www.skwebdesigner.com/facebook/php-script-to-save-facebook-user-information-to-mysql-database/
        Schema::create('fb_login', function (Blueprint $table)
        {
            $table->integer('user_id')  ->unsigned()  ->unique();

            //$table->integer('oauth_uid')  ->unsigned()  ->index();
            $table->string('oauth_provider',11);
            $table->mediumText('username');
            $table->mediumText('first_name');
            $table->mediumText('last_name');
            $table->mediumText('email');
            $table->mediumText('pic_square');

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
        Schema::drop('fb_login');
    }
}
