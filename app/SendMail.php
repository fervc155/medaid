<?php

namespace App;
use App\Notifications\MessageNotification;
use Illuminate\Support\Facades\Auth;

   
class SendMail  
{



    //////////////


    public static function toUser($user, $data=[])
    {

        $user->notify(new MessageNotification($data));
    }
	public static function User($user, $data=[])
	{


		$user->notify(new MessageNotification($data));
	}


	public static function toAdmin( $data=[])
	{

		$users = User::where('id_privileges','=','4')->get();



		SendMail::toUsers($users,$data);
	}

	public static function toOffice( $data=[])
	{

		$users = User::where('id_privileges','=','3')->get();



		SendMail::toUsers($users,$data);
	}



	public static function toUsers($users, $data=[])
	{
		if(Auth::check())
		{

			$users = $users->except(Auth::user()->id);
		}


		foreach ($users as $user) 
		{
			
			SendMail::toUser($user,$data);
		}
	}


}
