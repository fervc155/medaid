<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('time');
            $table->float('cost');
            $table->text('description');

            $table->integer('stars')->unsigned()->nullable();
            $table->text('comments')->nullable();

            $table->integer('condition_id')->unsigned()->default(1);
            $table->foreign('condition_id')->references('id')->on('conditions');
            $table->integer('doctor_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->integer('patient_dni')->unsigned();
            $table->foreign('patient_dni')->references('dni')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
