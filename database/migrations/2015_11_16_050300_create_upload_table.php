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
        Schema::create('uploaded', function (Blueprint $table)
        {
            $table->integer('user_id')  ->unsigned()  ->index();
            $table->enum('file_type', [
                                        'Profile Picture',
                                        'Insurance Papers',
                                        'Driving License',
                                        'Other Licenses',
                                        'National ID',
                                        'Other Supporting Documents',
                                        'Job Location Image',
                                    ]
                        )
                    ->default('Other Supporting Documents');
            $table->text('storing_name');
            $table->timestamps();

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
        Schema::drop('uploaded');
    }
}
