<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stamps', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('country_id')->unsigned()->nullable()->index();
            $table->string('type');
            $table->string('image');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stamps');
    }
}
