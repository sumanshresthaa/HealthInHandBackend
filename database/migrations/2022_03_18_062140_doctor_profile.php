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
        //
        Schema::create('doctorProfile', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ne');
            $table->string('speciality');
            $table->string('speciality_ne');
            $table->string('ratings');
            $table->string('ratings_ne');
            $table->string('experience');
            $table->string('experience_ne');
            $table->string('about');
            $table->string('about_ne');
            $table->string('availability');
            $table->string('availability_ne');
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
        //
    }
};
