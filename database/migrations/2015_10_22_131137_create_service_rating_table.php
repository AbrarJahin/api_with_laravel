<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_rating', function (Blueprint $table)
        {
            $table->integer('partner_id')   ->unsigned()  ->index();
            $table->integer('customer_id')  ->unsigned()  ->index();
            $table->integer('pss_id')       ->unsigned()  ->index();  //pss_id=partner_service_scheduling_id
            $table->text('comment');
            $table->float('rating');
            $table->timestamps();

            //Foreign Keys
            $table->foreign('partner_id')->references('id')->on('partners');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('pss_id')->references('id')->on('partner_service_scheduling');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('service_rating');
    }
}
