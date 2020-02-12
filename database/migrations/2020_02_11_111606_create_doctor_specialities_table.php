<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_speciality', function (Blueprint $table) {
          
            
           
            $table->integer('speciality_id')->unsigned();
            $table->foreign('speciality_id')->references('id')->on('specialities');

            $table->integer('doctor_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctors');

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
        Schema::dropIfExists('doctor_speciality');
    }
}
