<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secretariats', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('user_id')->nullable();
            $table->string('in')->nullable();
            $table->string('date')->nullable();
            $table->string('Subject', 255)->nullable();
            $table->longText('message')->nullable();
            $table->string('Signature')->nullable();
            $table->string('stamp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secretariats');
    }
};
