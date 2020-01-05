<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Office;
use App\Options;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    //Lista de pacientes
    public function index()
    {
        //Además de recuperar a los pacientes, se seleccionarán los médicos que tengan pacientes
        $patients = Patient::with(['doctor' => function ($query) {
            $query->has('patients');
        }])->get();

        return view('hospital.patient.indexPatients', compact('patients'));
    }

    //Agregar paciente
    public function create()
    {
                  $defaultImg= new Options();
        $defaultImg = $defaultImg->UserDefault();
      

        $doctors = Doctor::All();

        return view('hospital.patient.createPatient',compact('doctors','defaultImg'));
    }

    //Almacenar
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'curp'=>'required',
            'birthdate'=>'required',
            'telephoneNumber'=>'required',
            'sex'=>'required',
            'address'=>'required',
            'postalCode'=>'required',
            'city'=>'required',
            'country'=>'required',
            'doctor_id'=>'required'
        ]);

        //Crear paciente
        $patient = new Patient;
        $patient->name = $request->input('name');
        $patient->curp = $request->input('curp');
        $patient->birthdate = $request->input('birthdate');
        $patient->telephoneNumber = $request->input('telephoneNumber');
        $patient->sex = $request->input('sex');
        $patient->address = $request->input('address');
        $patient->postalCode = $request->input('postalCode');
        $patient->city = $request->input('city');
        $patient->country = $request->input('country');
        $patient->doctor_id = $request->input('doctor_id');
        $patient->save();

        return redirect('/patient')->with('success', '¡El paciente ha sido agregado con éxito!');
    }

    //Información de paciente
    public function show($id)
    {


        $patient = Patient::find($id);

        if(Auth::isPatient())
        {

            if (Auth::user()->id_user!=$id)
            {
                return view('admin');
            }
        }


        return view('hospital.patient.showPatient', compact('patient'))
        ->with('doctor', $patient->doctor)
        ->with('appointments', $patient->appointments);
    }

    //Editar paciente
    public function edit($id)
    {

        $patient = Patient::find($id);

        if(Auth::isPatient())
        {

            if (Auth::user()->id_user!=$id)
            {
                return view('admin');
            }
        }        

        $offices = Office::All();
        return view('hospital.patient.editPatient', compact('patient','offices'));
    }

    //Método update
    public function update(Request $request, Patient $patient)
    {
        $this->validate($request, [
            'name'=>'required',
            'curp'=>'required',
            'birthdate'=>'required',
            'telephoneNumber'=>'required',
            'sex'=>'required',
            'postalCode'=>'required',
            'city'=>'required',
            'country'=>'required',
            'doctor_id'=>'required'
        ]);

        //Editar paciente
        $patient->name = $request->input('name');
        $patient->curp = $request->input('curp');
        $patient->birthdate = $request->input('birthdate');
        $patient->telephoneNumber = $request->input('telephoneNumber');
        $patient->sex = $request->input('sex');
        $patient->address = $request->input('address');
        $patient->postalCode = $request->input('postalCode');
        $patient->city = $request->input('city');
        $patient->country = $request->input('country');
        $patient->doctor_id = $request->input('doctor_id');
        $patient->save();

        return redirect('/patient')->with('success', '¡El paciente ha sido actualizado con éxito!');
    }

    //Eliminar paciente
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect('/patient')->with('success', 'El paciente ha sido eliminado con éxito.');
    }
}
