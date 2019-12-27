<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment');

  
            $table->integer('user_id')->unsigned()->default(1);
            //tipo de usuario admin paciente etc



           // $table->foreign('user_id')->references('id')->on('users');
            //no existe aun 


            $table->integer('appointment_id')->unsigned();
            $table->foreign('appointment_id')->references('id')->on('appointments');
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
        Schema::dropIfExists('appointment_comments');
    }
}
