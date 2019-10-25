<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function medico()
    {
    	return view('web.medicos');
    }

    public function consultorio()
    {
    	return view('web.consultorios');

    }
    
    public function acerca()
    {
    	return view('web.acerca');

    }

    public function contacto()
    {
    	return view('web.contacto');

    }
    
    
}
