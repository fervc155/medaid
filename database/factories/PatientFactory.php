<?php

use App\Doctor;
use Faker\Generator as Faker;

$factory->define(App\Patient::class, function (Faker $faker) {



	$cp = array('11111','22222','33333','44444','55555','66666','77777','88888','99999','00000');

	$i = rand(0,9);

	return [
		'curp' => $faker->unique()->lexify('????????????????'),
		
		'address'=>$faker->sentence(4),
		'postalCode' => $cp[$i],
		'city'=> $faker->sentence(2),
		'country'=> $faker->sentence(1),

	];
});
