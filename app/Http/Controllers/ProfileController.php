<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function image($id)
    {

    	$user = User::find($id);

    	return $user->ProfileImg;

    }
}
