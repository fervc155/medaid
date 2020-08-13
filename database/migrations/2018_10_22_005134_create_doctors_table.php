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
            $table->char('schedule', 20); 

            $table->char('address', 200);
            $table->char('postalCode', 10);
            $table->char('city', 60);
            $table->char('country', 40);
                   
            $table->integer('office_id')->unsigned();
            $table->foreign('office_id')->references('id')->on('offices');

            $table->time('inTime');
            $table->time('outTime');
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
