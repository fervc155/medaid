<?php

use App\Doctor;
use Faker\Generator as Faker;

$factory->define(App\Patient::class, function (Faker $faker) {
     $Doctor = Doctor::all()->random();
   
    return [
        'name' => $faker->name,
        'curp' => $faker->unique()->lexify('????????????????'),
        'birthdate' => $faker->dateTimeBetween($startDate = '-100 years', $endDate = 'now', $timezone = null),
        'telephoneNumber' => $faker->numerify('##########'),
        'sex' => $faker->randomElement($array2 = array ('M','F')),
        'address'=>$faker->sentence(4),
        'postalCode' => $faker->numerify('#####'),
        'city'=> $faker->sentence(2),
        'country'=> $faker->sentence(1),
        'doctor_id'=> $Doctor->id
    ];
});
