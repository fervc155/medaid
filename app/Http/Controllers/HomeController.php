<?php

namespace App\Http\Controllers;

use App\Soft\Chatbot;
use App\Soft\levenshtein;
use App\Soft\math;
use App\Soft\Nlp;
use App\User;
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

      
 




      return Chatbot::responseByTerms('que es la competencia comunicativa en linguistica');



      return view('home');
  }
}
