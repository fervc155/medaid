<?php

namespace App\Http\Controllers;


use App\Doctor;
use Illuminate\Http\Request;

class chatController extends Controller
{
    public function index()
    {

    	$doctors = Doctor::All();
    	return view('chat.indexChat', compact('doctors'));
    }
}
