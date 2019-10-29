<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name', 100);
            $table->date('birthdate');
            $table->char('telephoneNumber', 16);
            $table->char('turno', 20);
            $table->char('sexo', 1);
            $table->char('cedula', 20);
            $table->integer('speciality_id')->unsigned();
            $table->foreign('speciality_id')->references('id')->on('specialities');
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
