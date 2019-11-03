<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Appointments;
use Illuminate\Http\Request;

date_default_timezone_set('UTC');

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $_appointments = new Appointments;
 
       return view('home', compact('_appointments'));
    //return count($_appointments->pending);
    }
}
