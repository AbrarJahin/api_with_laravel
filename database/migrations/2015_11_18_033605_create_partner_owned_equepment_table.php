<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerOwnedEquepmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_owned_equepment', function (Blueprint $table)
        {
            $table->integer('partner_id')  ->unsigned()  ->index();
            $table->string('owned_equipment',30);

            //Foreign Keys
            $table->foreign('partner_id')->references('id')->on('partners');

            $table->unique('partner_id','owned_equipment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partner_owned_equepment');
    }
}
