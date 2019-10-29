<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Office;
use App\Speciality;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function especialidades()
    {


        $specialities = Speciality::All();

    	return view('web.especialidades', compact('specialities'));
    }
        public function especialidad($name)
    {


        $speciality = Speciality::all()->where('name',$name)->first();

    return view('web.especialidad', compact('speciality'))
        ->with('doctors', $speciality->doctors);

}


    public function consultorio()
    {


        $offices = Office::all();
    	return view('web.consultorios', compact('offices'));

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
