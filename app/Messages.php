<?php

namespace App;

use App\Chat;
use Illuminate\Support\Facades\Auth;

class Messages 
{
    

 

    public static function getMessages($idUser,$count=10)
    {
    		$chats = Chat::where('user_out',$idUser)
		->where('user_in',Auth::user()->id)
		->get();

		$chats2 = Chat::where('user_in',$idUser)
		->where('user_out',Auth::user()->id)
		->get();


		$messages = $chats->merge($chats2);
		$messages = $messages->unique('id');

 
		$messages= $messages->sortByDesc('id')->take($count);

		return $messages->reverse();


    }

    public function checkMessages()
    {

    }
}
