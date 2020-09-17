<?php

namespace App;

use App\Chat;
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
    		$chats = DB::table('chats')
    		->select('id')
    		->where('user_out',$idUser)
		->where('user_in',Auth::user()->id)
		->get();

		$chats2 = DB::table('chats')
   		->select('id')
		->where('user_in',$idUser)
		->where('user_out',Auth::user()->id)
		->get();


		$messages = $chats->merge($chats2);
 
 
 
		return $messages->count();


    }

}
