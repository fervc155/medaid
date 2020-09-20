<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function index()
	{

		if (Auth::Office()) {
			$users = User::all();
			return view('hospital.user.indexUser', compact('users'));
		}

		return view('admin');
	}


	public function block(Request $request, User $user)
	{

		if($user->active)
		{

			$user->active =0;
			$user->save();
			return redirect('user')->with('success','Usuario bloqueado correctamente');
		}
		
	$user->active =1;
				$user->save();

			return redirect('user')->with('success','Usuario activado correctamente');

	}
}
