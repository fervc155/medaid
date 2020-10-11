<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Office;
use App\Speciality;
use App\User;
use Illuminate\Http\Request;

class WebController extends Controller
{

    /*======================================
    =            especialidades            =
    ======================================*/

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

    public function mapa($id)
    {


        $office = Office::find($id);

        return view('web.mapa', compact('office'));
    }


    /*=====  End of especialidades  ======*/




    /*====================================
    =            consultorios            =
    ====================================*/





    public function consultorios()
    {


        $offices = Office::all();
        return view('web.consultorios', compact('offices'));
    }

    public function consultorio($id)
    {

        $office = Office::find($id);

        $specialities = array();

        foreach ($office->doctors as $doctor) {

            foreach ($doctor->specialities as $speciality) {

                if (!in_array($speciality->name, $specialities)) {

                    array_push($specialities, $speciality->name);
                }
            }
        }




        return view('web.consultorio', compact('office', 'specialities'))->with('doctors', $office->doctors);
    }
    /*=====  End of consultorios  ======*/


    /*================================
        =            Doctores            =
        ================================*/

    public function doctor($id)
    {

        $doctor = Doctor::find($id);



        return view('web.doctor', compact('doctor'))->with('patients', $doctor->patients)
            ->with('appointments', $doctor->appointments);
    }

    public function doctores()
    {

        $doctors = Doctor::all();



        return view('web.doctores', compact('doctors'));
    }



    /*=====  End of Doctores  ======*/



    /*=============================
=            CITAS            =
=============================*/

    public function citas()
    {
        return view('web.citas');
    }

    /*=====  End of CITAS  ======*/


    public function acerca()
    {
        return view('web.acerca');
    }

    public function contacto()
    {
        return view('web.contacto');
    }


    public function visitante()
    {


        $offices = Office::all();
        return view('web.consultorios', compact('offices'));
    }
}
