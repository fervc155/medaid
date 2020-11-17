<?php

use App\Appointment;
use App\Payment;
use Illuminate\Database\Seeder;
class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Appointment::class, 100)->create();


        Appointment::All()->each(function ($appointment) 
        {


            if($appointment->condition_id==1 || 
             $appointment->condition_id==2 ||
             $appointment->condition_id==5)
            {
                $payment = new Payment;

                $payment->cost = $appointment->cost;
                $payment->description = $data['description']??null;
                $payment->appointment_id = $appointment->id;
                $payment->online=0;

                $payment->save();

            }



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
