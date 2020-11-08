<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Crud;
use App\Doctor;
use App\Office;
use App\Options;
use App\Patient;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
  //Lista de pacientes
  public function index()
  {


 
      $myProfileId=Auth::user()->profile()->id;
    if (Auth::isDoctor()) {

      $patients = Auth::user()->profile()->myPatients();




      return view('hospital.patient.indexPatients', compact('patients'));
    }

    if (Auth::isOffice()) {


      $doctors = Doctor::where('office_id', $myProfileId)->get();

      $patients = Collection::make(new Patient);


      foreach ($doctors as $doctor) {


        $patients2 = $doctor->myPatients();
        $patients = $patients->merge($patients2);
      }



      $patients = $patients->unique('dni');






      return view('hospital.patient.indexPatients', compact('patients'));
    }

    if (Auth::Admin()) {

      $patients = Patient::active();

      return view('hospital.patient.indexPatients', compact('patients'));
    }

    return view('admin');
  }

  //Agregar paciente
  public function create()
  {
    if (Auth::Office()) {

      $defaultImg = new Options();
      $defaultImg = $defaultImg->UserDefault();


      $doctors = Doctor::active();

      return view('hospital.patient.createPatient', compact('doctors', 'defaultImg'));
    }

    return view('admin');
  }

  //Almacenar
  public function store(Request $request)
  {



    if (Auth::Office()) {



      $data = request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'telephone' => 'required|string|max:20',
        'sex' => 'required|string|max:1',
        'image' => 'required|file',
        'birthdate' => 'required|date',
        'password' => 'required|string|min:6|confirmed',
        'curp' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'postalCode' => 'required|integer|max:999999',
        'city' => 'required|string|max:255',
        'country' => 'required|string|max:255',


      ]);


      $patient = new Patient();

      $patient->curp = $data['curp'];
      $patient->doctor_id = 1;

      //address
      $patient->address = $data['address'];
      $patient->postalCode = $data['postalCode'];
      $patient->city = $data['city'];
      $patient->country = $data['country'];






      $patient->save();
      dd($patient);


      Crud::newUser($data, 'patient', $patient->dni, $ruta_imagen);

      return redirect('/patient')->with('success', '¡El paciente ha sido agregado con éxito!');
    }

    //  return view('admin');
  }

  //Información de paciente
  public function show($id)
  {

    if (Auth::Patient()) {


      $patient = Patient::find($id);
      $appointments = $patient->appointments;

      if (Auth::isPatient()) {

        if (Auth::user()->id_user != $id) {
          return view('admin');
        }

        $appointments = $patient->appointments;
      }


      if (Auth::isDoctor()) {



        $appointments = Appointment::where('doctor_id', '=', Auth::UserId())->where('patient_dni', '=', $patient->dni)->get();
      }

      if (Auth::Office()) {
      }

      return view('hospital.patient.showPatient', compact('patient'))
        ->with('doctor', $patient->doctor)
        ->with('appointments', $appointments);
    }

    return view('admin');
  }

  //Editar paciente
  public function edit($id)
  {

    $patient = Patient::find($id);





    if (Auth::isPatient()) {

      if (Auth::user()->id_user != $id) {
        return view('admin');
      }
      $offices = Office::active();
      return view('hospital.patient.editPatient', compact('patient', 'offices'));
    }




    if (Auth::Office()) {



      $offices = Office::active();
      return view('hospital.patient.editPatient', compact('patient', 'offices'));
    }
    return view('admin');
  }

  //Método update
  public function update(Request $request,  $id)
  {

    if ((Auth::isPatient() && Auth::user()->profile()->id == $id) || Auth::Office()) {


      $data = request()->validate([
        'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255',
        'curp' => 'required|string|max:20',
        'birthdate' => 'required|date',
        'telephone' => 'required|string|max:20',
        'sex' => 'required|string|max:1',
        'postalCode' => 'required|integer|max:999999',
        'city' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'doctor_id' => 'required',
        //     'image' => 'required',

        'address' => 'required|string|max:255',


      ]);


      $patient = Patient::find($id);






      $patient->curp = $data['curp'];
      $patient->address = $data['address'];
      $patient->postalCode = $data['postalCode'];
      $patient->city = $data['city'];
      $patient->country = $data['country'];
      $patient->doctor_id = $data['doctor_id'];





      $patient->save();


      //$ruta_imagen =  $data['image']->store('patients','public');


      $user = $patient->user();

      $user->name = $data['name'];
      $user->email = $data['email'];
      $user->telephone = $data['telephone'];
      $user->sex = strtolower($data['sex']);
      $user->birthdate = $data['birthdate'];


      $user->save();





      return redirect('/patient/' . $id)->with('success', '¡El paciente ha sido actualizado con éxito!');
    }

    return view('admin');
  }

 

  //Eliminar paciente
  public function destroy(Patient $patient)
  {
    if (Auth::Office()) {

      $patient->user()->deactivate();

      return redirect('/patient')->with('success', 'El paciente ha sido eliminado con éxito.');
    }
  }
}
