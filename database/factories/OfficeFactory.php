<?php

use Faker\Generator as Faker;

$factory->define(App\Office::class, function (Faker $faker) {
     return [
        'name' => $faker->name,
        'address'=>$faker->sentence(4),
        'postalCode' => $faker->numerify('#####'),
        'city'=> $faker->sentence(2),
        'country'=> $faker->sentence(1),
      ];
});
