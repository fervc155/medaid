<?php

use App\Appointment;
use Faker\Generator as Faker;

$factory->define(App\Appointment::class, function (Faker $faker) {
       return [
        'date' => $faker->dateTimeBetween($startDate = '-6 months', $endDate = '+6 months', $timezone = null),
        'time' => $faker->randomElement($array2 = array ('09:00:00','09:30:00','10:00:00','10:30:00','10:30:00','11:00:00','11:30:00','12:00:00','12:30:00','13:00:00','13:30:00','14:00:00','14:30:00','15:00:00','15:30:00','16:00:00','16:30:00','17:00:00','17:30:00','18:00:00','18:30:00','19:00:00','19:30:00','20:00:00','20:30:00','21:00:00','21:30:00','22:00:00','22:30:00','23:00:00',)),
        'cost'=> $faker->randomElement($array2 = array ('40','60','120','150','200')),
        'description'=>$faker->sentence(5),
        'stars'=>$faker->numberBetween(2,5),
        'condition_id' =>  $faker->numberBetween(1,7),

        'doctor_id'=> $faker->numberBetween(1,20),
        'patient_dni'=>$faker->numberBetween(1,20)

    ];
});

//15:44:00