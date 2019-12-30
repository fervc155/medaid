<?php

use Faker\Generator as Faker;

$factory->define(App\Doctor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'birthdate' => $faker->dateTimeBetween($startDate = '-90 years', $endDate = '-18 years', $timezone = null),
        'telephoneNumber' => $faker->numerify('##########'),
        'turno' => $faker->randomElement($array = array ('Matutino','Vespertino')),
        'sexo' => $faker->randomElement($array2 = array ('M','F')),
        'cedula' => $faker->unique()->lexify('??????????'),
        
        'speciality_id' =>$faker->numberBetween(1,8),

        'office_id' =>$faker->numberBetween(1,4),

        'inTime' =>$faker->randomElement($array2 = array ('09:00:00','09:30:00','10:00:00','10:30:00','10:30:00','11:00:00','11:30:00','12:00:00','12:30:00','13:00:00','13:30:00','14:00:00')),
        'outTime' =>$faker->randomElement($array2 = array ('15:00:00','15:30:00','16:00:00','16:30:00','17:00:00','17:30:00','18:00:00','18:30:00','19:00:00','19:30:00','20:00:00','20:30:00','21:00:00','21:30:00','22:00:00','22:30:00','23:00:00')),
        ];
});
