<?php

namespace App;

use App\Privileges;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class Crud extends Model
{

	public static function newUser($data, $privilege, $model_id)
	{

		$ruta_imagen =  $data['image']->store('profile', 'public');

		$user = new User();
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->telephone = $data['telephone'];
		$user->sex = $data['sex'];
		$user->birthdate = $data['birthdate'];
		$user->image = $ruta_imagen;
		$user->id_privileges = Privileges::Id($privilege);
		$user->id_user = $model_id;
		$user->password = Hash::make($data['password']);
		$user->save();
	}

	public static function newAdmin($data, $model_id)
	{

 
		$user = new User();
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->telephone = $data['telephone'];
		$user->sex = $data['sex'];
		$user->birthdate = $data['birthdate'];
		$user->id_privileges = Privileges::Id('admin');
		$user->id_user = $model_id;
		$user->password = Hash::make($data['password']);
		$user->save();
	}

	public static function newUserSeeder($privilege, $model_id)
	{

		$faker = Faker::create();
		$data = array(
			'name' => $faker->name,
			'email' => $faker->email,
			'telephone' => $faker->numerify('##########'),
			'sex' => $faker->randomElement($array2 = array('m', 'f')),
 			'birthdate' => $faker->dateTimeBetween($startDate = '-90 years', $endDate = '-18 years', $timezone = null),
			'password' => '123456',
		//	'imagen' => 'profile/img.jpg',


		);

		$user = new User();
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->telephone = $data['telephone'];
		$user->sex = $data['sex'];
		$user->birthdate = $data['birthdate'];
		//$user->image = $data['imagen'];
		$user->id_privileges = Privileges::Id($privilege);
		$user->id_user = $model_id;
		$user->password = Hash::make($data['password']);
		$user->save();
	}
}
