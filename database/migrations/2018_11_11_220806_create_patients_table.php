<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('dni');
            $table->char('name', 100);
            $table->char('curp', 30);
            $table->date('birthdate');
            $table->char('telephoneNumber', 16);
            $table->char('sex', 20);
            $table->char('address', 200);
            $table->char('postalCode', 10);
            $table->char('city', 60);
            $table->char('country', 40);

            $table->integer('doctor_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
