<?php

use Faker\Generator as Faker;

$factory->define(App\Doctor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'birthdate' => $faker->date,
        'telephoneNumber' => $faker->numerify('##########'),
        'turno' => $faker->randomElement($array = array ('Matutino','Vespertino')),
        'sexo' => $faker->randomElement($array2 = array ('M','F')),
        'cedula' => $faker->unique()->lexify('??????????'),
        'especialidad' => $faker->randomElement($array3 = array ('Neurólogo','Pediatra', 'Cirujano', 'Odontólogo', 'Oncólogo'))
    ];
});
