<?php

namespace App\Http\Controllers;


 use App\User;
use App\Chat;
use App\Messages;
use App\Soft\Chatbot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notification;

class chatController extends Controller
{
	public function index()
	{

	 
	
 

		return view('chat.indexChat');
	}

	public function count(Request $request)
	{


		return Messages::count($request->input('_userOut'));
		
	}

	public function total(Request $request)
	{


		return Messages::total();
		
	}


	public function bot()
	{


		return view('chat.bot');
	}
}
