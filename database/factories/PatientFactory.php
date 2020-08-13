<?php

use App\Doctor;
use Faker\Generator as Faker;

$factory->define(App\Patient::class, function (Faker $faker) {
     $Doctor = Doctor::all()->random();
   
    return [
        'curp' => $faker->unique()->lexify('????????????????'),
        'doctor_id'=> $Doctor->id,
        'address'=>$faker->sentence(4),
        'postalCode' => $faker->numerify('#####'),
        'city'=> $faker->sentence(2),
        'country'=> $faker->sentence(1),

    ];
});
