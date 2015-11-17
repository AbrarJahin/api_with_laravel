<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZipCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_codes', function (Blueprint $table)
        {
            //$table->increments('id');             //No Need
            $table->string('zip_code',10)->unique();    //may be confusing, so it is string, not integer
            $table->enum('type', array('UNIQUE', 'STANDARD', 'PO BOX'));
            $table->string('primary_city', 30);
            $table->string('acceptable_cities', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('zip_codes');
    }
}
