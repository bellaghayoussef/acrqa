<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letters', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('code')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('Subject', 255)->nullable();
            $table->longText('message')->nullable();
            $table->string('Signature')->nullable();
            $table->string('approved')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('letters');
    }
}
