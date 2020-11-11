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

pk_test_51Hm4SrDxe4dXiGj7N2DdM2TiLJgN9LVL9tLx7H9UhrX6xz67kHacNLxMmf5IuQYGVL4aY9uyR9BCngv9g3LOMuEM00Jni03sYk

sk_test_51Hm4SrDxe4dXiGj7JDxcXA8VlrCPQkR8DnWNsjjmEek6jb918YChymiB3MDJhAaKXxRtaaWrRviOsuuPQp9GhbM700n5aE9MxU
*/