<?php

use Faker\Generator as Faker;

$factory->define(App\Appointment_comment::class, function (Faker $faker) {
	return [

		'comment'=>$faker->sentence(20),
		'user_id'=>1,
		'appointment_id'=>$faker->numberBetween(1,2000),





	];
});