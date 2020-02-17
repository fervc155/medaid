<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index()
    {

    	if(Auth::Office())
    	{
    		$users = User::all();
            return view('hospital.user.indexUser', compact('users'));



    	}

    	return view('admin');

    }
}
