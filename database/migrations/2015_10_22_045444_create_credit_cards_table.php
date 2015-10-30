<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_cards', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('customer_id')  ->unsigned()  ->index();
            $table->string('credit_card_no',60);
            $table->string('cvv',10);
            $table->integer('expire_month_id',false,2)->index();
            $table->integer('expire_year',false,5);
            $table->string('neme_of_the_card',20);
            $table->tinyInteger('is_enabled');

            $table->timestamp('created_at');

            //Foreign Keys
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('expire_month_id')->references('id')->on('months');

            //Unique
            $table->index(['customer_id', 'credit_card_no']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('credit_cards');
    }
}
