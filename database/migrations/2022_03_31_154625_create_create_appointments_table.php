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
        Schema::create('create_appointments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('age');
            $table->string('gender');
            $table->string('phone');
            $table->dateTime('datetime');
            $table->string('doctorName');
            $table->string('hospitalName');
            $table->string('describeProblem');
            $table->string('optional1');
            $table->string('optional2');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
         
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
        Schema::dropIfExists('create_appointments');
    }
};
