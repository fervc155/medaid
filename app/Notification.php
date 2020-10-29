<?php

namespace App;

 use App\Notifications\Notifications;
use Illuminate\Support\Facades\Auth;
 
class Notification{ 




	public static function toUser($user, $data=[])
	{



		$user->notify(new Notifications($data));
	}


	public static function User($user, $data=[])
	{


		$user->notify(new Notifications($data));
	}


	public static function toAdmin( $data=[])
	{

		$users = User::where('id_privileges','=','4')->get();



		Notification::toUsers($users,$data);
	}

	public static function toOffice( $data=[])
	{

		$users = User::where('id_privileges','=','3')->get();



		Notification::toUsers($users,$data);
	}



	public static function toUsers($users, $data=[])
	{
		if(Auth::check())
		{

			$users = $users->except(Auth::user()->id);
		}


		foreach ($users as $user) 
		{
			
			Notification::toUser($user,$data);
		}
	}

 


}
