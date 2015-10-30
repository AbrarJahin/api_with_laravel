<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCustomersTable extends Migration
{
    public function up()
    {
        Schema::table('customers',function(Blueprint $table)
        {
            $table->integer('selected_credit_card_id')->after('stripe_id')->unsigned()  ->index();

            //Foreign Keys
            $table->foreign('selected_credit_card_id')->references('id')->on('credit_cards');
        });
    }

    public function down()
    {
        Schema::table('customers',function(Blueprint $table)
        {
            //Newly added foreign key constraint is => customers_selected_credit_card_id_foreign
            DB::statement('ALTER TABLE customers DROP FOREIGN KEY customers_selected_credit_card_id_foreign');
            $table->dropColumn('selected_credit_card_id');
        });
    }
}
