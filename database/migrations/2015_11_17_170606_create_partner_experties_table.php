<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerExpertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_experties', function (Blueprint $table)
        {
            $table->integer('partner_id')  ->unsigned()  ->index();
            $table->string('experties_name',30);

            //Foreign Keys
            $table->foreign('partner_id')->references('id')->on('partners');

            $table->unique(['partner_id','experties_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partner_experties');
    }
}
