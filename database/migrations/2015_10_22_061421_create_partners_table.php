<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')  ->unsigned()  ->index();
            $table->string('company_name',20);
            $table->enum('type_of_phone', ['Android', 'iOS', 'Other']);
            $table->enum('is_18_years_old', ['yes', 'no']);

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
        Schema::drop('partners');
    }
}
