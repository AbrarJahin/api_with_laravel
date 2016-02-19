<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduledServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduled_service', function (Blueprint $table)
        {                   //customer's scheduled services are stored here
            $table->increments('id');
            $table->integer('customer_id')              ->unsigned()  ->index();
            $table->integer('frequency_customer_id')    ->unsigned()  ->index();
            $table->string('discount_code',15)          ->index();
            $table->integer('paid_card_id')             ->unsigned()  ->index();
            $table->float('tip');
            $table->float('payable_money');
            $table->enum('is_done', ['Open','In Progress', 'Cancelled', 'Done'])->default('Open');   //if work done, then payment done, then is_done=1
            $table->timestamps();                       //updated_at = job_done and done payment
            //created_at                                = Job start time
            //updated_at or service_rating.created_at   = Job end time

            //Foreign Keys
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('frequency_customer_id')->references('id')->on('frequency-customer');
            $table->foreign('discount_code')->references('discount_code')->on('discount');
            $table->foreign('paid_card_id')->references('id')->on('credit_cards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scheduled_service');
    }
}
