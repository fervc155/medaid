<?php

use App\Appointment;
use App\Condition;
use App\Doctor;
use App\Patient;
use App\Speciality;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Appointment::class, function (Faker $faker) {


    $Condition = Condition::all()->random();
    $Doctor = Doctor::all()->random();
    $Patient = Patient::all()->random();


    $date =$faker->dateTimeBetween($startDate = '-1 months', $endDate = '+1 months', $timezone = null);

       $data = [
        'date' =>$date,
        'time' => $faker->randomElement($array2 = array ('09:00:00','09:30:00','10:00:00','10:30:00','10:30:00','11:00:00','11:30:00','12:00:00','12:30:00','13:00:00','13:30:00','14:00:00','14:30:00','15:00:00','15:30:00','16:00:00','16:30:00','17:00:00','17:30:00','18:00:00','18:30:00','19:00:00','19:30:00','20:00:00','20:30:00','21:00:00','21:30:00','22:00:00','22:30:00','23:00:00',)),
        'description'=>$faker->sentence(5),
        'condition_id' =>  $Condition->id,
        'doctor_id'=> $Doctor->id,
        'patient_dni'=>$Patient->dni,
        'created_at'=> $date,
        'updated_at'=> $date,

    ];


    $data['speciality_id'] = $Doctor->specialities[0]->id;
    $data['cost'] = $Doctor->specialities[0]->cost;


    return $data;

});

//15:44:00