<?php

use Illuminate\Database\Seeder;
use App\Appointment;
class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Appointment::class, 200)->create();


    	Appointment::All()->each(function ($appointment) 
    	{


    		if ($appointment->condition_id == 3) 
    		{
    			# code...


    		$appointment->prescriptions()->create(
    			[
    				'content'=>'receta generada automaticamente',

    			]);
 
 
    		}
    	});
    }
}
