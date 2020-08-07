<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Appointments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


        if(Auth::Patient())
        {



            if(Auth::isPatient())
            {
                $_appointmentsToday  = Appointments::Today('patient_dni',Auth::UserId());
                $_appointmentsPending  = Appointments::Pending();

     
            }

            if(Auth::isDoctor() || Auth::isOffice())
            {

                    $_appointmentsPending  = Appointments::Pending();
            $_appointmentsToday  = Appointments::Today('doctor_id',Auth::UserId());
     
            }

               if(Auth::isPatient())
            {
                $_appointmentsToday  = Appointments::Today('patient_dni',Auth::UserId());
                    $_appointmentsPending  = Appointments::Pending();
 
            }
               if(Auth::isAdmin())
            {
                $_appointmentsToday  = Appointments::Today();
                $_appointmentsPending  = Appointments::Pending();

            }
        }

        
       return view('home', compact('_appointmentsToday','_appointmentsPending'));


        return view('admin');







 
    //return count($_appointments->pending);
    }
}
