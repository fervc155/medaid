<?php

use App\Appointment;
use Faker\Generator as Faker;

$factory->define(App\Appointment::class, function (Faker $faker) {
       return [
        'date' => $faker->dateTimeBetween($startDate = '-6 months', $endDate = '+6 months', $timezone = null),
        'time' => $faker->unique()->time,
        'cost'=> $faker->randomElement($array2 = array ('40','60','120','150','200')),
        'description'=>$faker->sentence(5),
        'comments'=>'',
        'stars'=>$faker->numberBetween(2,5),
        'condition_id' =>  $faker->numberBetween(1,7),

        'doctor_id'=> $faker->numberBetween(1,20),
        'patient_dni'=>$faker->numberBetween(1,50)

    ];
});
