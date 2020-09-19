<?php

namespace App;

use App\Chat;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Messages 
{




	public static function get($idUser,$count=20)
	{
  //   		$chats = Chat::where('user_out',$idUser)
		// ->where('user_in',Auth::user()->id)
		// ->get();

		// $chats2 = Chat::where('user_in',$idUser)
		// ->where('user_out',Auth::user()->id)
		// ->get();


		// $messages = $chats->merge($chats2);

		$messages = Chat::whereIn('user_in',[Auth::user()->id,$idUser])
		->whereIn('user_out',[Auth::user()->id,$idUser])
		->orderBy('id','desc')
		->get()
		->take($count);


		return $messages->reverse();


	}

	public static function count($idUser)
	{
		$messages = Chat::whereIn('user_in',[Auth::user()->id,$idUser])
		->whereIn('user_out',[Auth::user()->id,$idUser])
 		->get('id');





		return $messages->count();


	}


	public static function total()
	{
		$messages = Chat::where('user_in',Auth::user()->id)
		->orWhere('user_out',Auth::user()->id)
 		->get('id');





		return $messages->count();


	}


	public static function senders()
	{
		$messages = Chat::where('user_in',Auth::user()->id)
		->orWhere('user_out',Auth::user()->id)
		->orderBy('id','desc')
		->get()
		->unique('user_in','user_out');


		$users = new Collection;


		foreach ($messages as $message ) 
		{
			$user =User::find($message->user_in);

			if(!$users->contains($user))
			{
				$users->add($user);

			}

			$user =User::find($message->user_out);


			if(!$users->contains($user))
			{
				$users->add($user);

			}
		}

	 
		$users = $users->reject(Auth::user());
		return $users;



	}


	public static function lastest()
	{
		return Chat::where('user_in',Auth::user()->id)
		->orwhere('user_out',Auth::user()->id)
		->orderBy('id','desc')
		->get()->first();
	}

}
