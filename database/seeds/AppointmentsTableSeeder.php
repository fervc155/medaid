<?php

use App\Appointment;
use App\Payment;
use App\Review;
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


            if(
             $appointment->condition_id==2 ||
             $appointment->condition_id==3 ||
             $appointment->condition_id==6)
            {
                $payment = new Payment;

                $payment->cost = $appointment->cost;
                $payment->description = $data['description']??null;
                $payment->appointment_id = $appointment->id;
                $payment->online=0;

                $payment->save();


            }



            if ($appointment->condition_id == 3 ||
             $appointment->condition_id==6) 
            {
    			




                $review = new Review;

                $review->stars = rand(2,5);

                $review->comment ="Review comentada automaticamente";
                $review->appointment_id = $appointment->id;
                $review->save();


              $appointment->prescriptions()->create(
                 [
                    'content'=>'receta generada automaticamente',

                ]);
              
              
          }
      });
    }
}
