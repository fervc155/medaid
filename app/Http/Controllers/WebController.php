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
        public function especialidad($id)
    {


        $speciality = Speciality::find($id);

    return view('web.especialidad', compact('speciality'))
        ->with('doctors', $speciality->doctors);

}


    public function consultorios()
    {


        $offices = Office::all();
        return view('web.consultorios', compact('offices'));

    }

    public function consultorio($id)
    {

        $office = Office::find($id);


        return view('web.consultorio', compact('office'))->with('doctors',$office->doctors);

    }
    
    public function acerca()
    {
    	return view('web.acerca');

    }

    public function contacto()
    {
    	return view('web.contacto');

    }
    
       public function doctor($id)
    {

        $doctor = Doctor::find($id);

        return view('web.doctor', compact('doctor'))->with('patients', $doctor->patients)
        ->with('appointments', $doctor->appointments);

    }

    public function doctores()
    {

        $doctors = Doctor::paginate(10);

        return view('web.doctores', compact('doctors'));
      

    }


    public function visitante()
    {


        $offices = Office::all();
        return view('web.consultorios', compact('offices'));

    }

    
    
}
