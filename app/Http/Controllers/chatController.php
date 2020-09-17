<?php

namespace App\Http\Controllers;


 use App\User;
use App\Chat;
use App\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
