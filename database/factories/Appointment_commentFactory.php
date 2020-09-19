<?php

use App\Appointment;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Appointment_comment::class, function (Faker $faker) {

	$Appointment = Appointment::all()->random();
	$user = User::all()->random();
	return [

		'comment'=>$faker->sentence(20),
		'user_id'=>$user->id,
		'appointment_id'=>$Appointment->id,





	];
});