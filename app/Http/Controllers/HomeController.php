<?php

namespace App\Http\Controllers;

use App\Soft\Chatbot;
use App\Soft\Tree;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        if(Auth::user()->isPatient())
        {


         return  $this->patient();
     }



     if(Auth::user()->isDoctor())
     {


         return  $this->doctor();
     }


     if(Auth::user()->isOffice())
     {


         return  $this->office();
     }


     if(Auth::user()->isAdmin())
     {


         return  $this->admin();
     }
     
 }


 public function patient()
 {
    return view('hospital.home.patient');

}

public function doctor()
{
    return view('hospital.home.doctor');

}

public function office()
{
    return view('hospital.home.office');

}
public function admin()
{
    return view('hospital.home.admin');

}
}



/**

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
*/