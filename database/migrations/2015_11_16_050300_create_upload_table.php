<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploades', function (Blueprint $table)
        {
            $table->integer('partner_id')  ->unsigned()  ->index();
            $table->enum('file_type', [
                                        'Profile Picture',
                                        'Insurance Papers',
                                        'Driving License',
                                        'Other Licenses',
                                        'National ID',
                                        'Other Supporting Documents',
                                    ]
                        )
                    ->default('Other Supporting Documents');
            $table->text('storing_location');
            $table->timestamps();

            //Foreign Keys
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
        Schema::drop('uploades');
    }
}
