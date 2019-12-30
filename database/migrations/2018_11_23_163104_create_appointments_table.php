<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
  
            $table->integer('condition_id')->unsigned()->default(1);
            $table->foreign('condition_id')->references('id')->on('conditions');
            $table->integer('doctor_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->integer('patient_dni')->unsigned();
            $table->foreign('patient_dni')->references('dni')->on('patients');


                        $table->timestamps();

        });


/*        DB::statement("SET GLOBAL event_scheduler = ON;");

        DB::statement("CREATE EVENT `update_appointment_pending_lost` ON SCHEDULE EVERY 1 MINUTE STARTS '2019-12-29 00:00:00.000000' ENDS '2029-12-29 00:00:00.000000' ON COMPLETION PRESERVE ENABLE DO update appointments set condition_id=7  where date <= DATE_FORMAT(NOW(),'%Y-%m-%d') and hora < CURRENT_TIME() and condition_id=1;");

        DB::statement("CREATE EVENT `update_appointment_accepted_lost` ON SCHEDULE EVERY 1 MINUTE STARTS '2019-12-29 00:00:00.000000' ENDS '2029-12-29 00:00:00.000000' ON COMPLETION PRESERVE ENABLE DO update appointments set condition_id=7  where date <= DATE_FORMAT(NOW(),'%Y-%m-%d') and hora < CURRENT_TIME() and condition_id=2;");
*/
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
