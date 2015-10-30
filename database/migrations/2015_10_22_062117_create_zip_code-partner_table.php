<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZipCodePartnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_code-partner', function (Blueprint $table)
        {
            $table->string('zip_code',10)->index();
            $table->integer('partner_id')  ->unsigned()  ->index();

            //Foreign Keys
            $table->foreign('zip_code')->references('zip_code')->on('zip_codes');
            $table->foreign('partner_id')->references('id')->on('partners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('zip_code-partner');
    }
}
