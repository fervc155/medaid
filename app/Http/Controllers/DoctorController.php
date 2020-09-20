<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Office;
use App\Options;
use App\Crud;
use App\Speciality;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class DoctorController extends Controller
{
  //Lista de doctores
  public function index()
  {


    if (Auth::Patient()) {


      $doctors = Doctor::active();
      return view('hospital.doctor.indexDoctors', compact('doctors'));
    }
    return view('admin');
  }

  //Crear doctores
  public function create()
  {
    if (Auth::Office()) {

      $defaultImg = new Options();
      $defaultImg = $defaultImg->UserDefault();

      $offices = Office::active();
      $specialities = Speciality::active();
      return view('hospital.doctor.createDoctor', compact('offices', 'specialities', 'defaultImg'));
    }
    return view('admin');
  }



  //Almacenar doctor
  public function store(Request $request)
  {
    if (Auth::Office()) {


      $data = request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'telephone' => 'required|string|max:20',
        'sex' => 'required|string|max:1',
        'image' => 'required',
        'password' => 'required|string|min:6|confirmed',
        'address' => 'required|string|max:255',
        'birthdate' => 'required',
        'postalCode' => 'required|string|max:7',
        'city' => 'required|string|max:255',
        'country' => 'required|string|max:255',

        //
        'especialidad.*' => 'required',
        'schedule' => 'required',
        'office_id' => 'required',
        'inTime' => 'required',
        'outTime' => 'required',

      ]);

      //Crear médico
      $doctor = new Doctor;
      $doctor->schedule = $data['schedule'];
      $doctor->office_id = $data['office_id'];
      $doctor->inTime = $data['inTime'];
      $doctor->outTime = $data['outTime'];

      //address
      $doctor->address = $data['address'];
      $doctor->postalCode = $data['postalCode'];
      $doctor->city = $data['city'];
      $doctor->country = $data['country'];

      $doctor->save();


      $especialidades = $data['especialidad'];

      for ($i = 0; $i < count($especialidades); $i++) {
        $speciality_id = $especialidades[$i];

        echo $speciality_id . " ";
        $doctor->specialities()->attach($speciality_id);
      }


      //imagen
      $ruta_imagen =  $data['image']->store('patients', 'public');


      Crud::newUser($data, 'doctor', $doctor->id, $ruta_imagen);



      return redirect('/doctor')->with('success', '¡El médico ha sido agregado con éxito!');
    }
    return view('admin');
  }
  

 
  //Mostrar información de doctor
  public function show($id)
  {

    $doctor = Doctor::find($id);


    if (Auth::Patient()) {







      return view('hospital.doctor.showDoctor', compact('doctor'))
        ->with('patients', $doctor->patients)
        ->with('appointments', $doctor->appointments);
    }

    return view('admin');
  }

  //Actualizar doctor
  public function edit($id)
  {

    $doctor = Doctor::find($id);






    if (Auth::isAdmin() ||  Auth::user()->profile()->id == $id  || (Auth::isOffice() && Auth::user()->profile()->id == $doctor->office_id)) {

      $offices = Office::active();
      $specialities = Speciality::all();
      return view('hospital.doctor.editDoctor', compact('doctor', 'specialities', 'offices'));
    }
    return view('admin');
  }

  //Método update
  public function update(Request $request, Doctor $doctor)
  {

    if (Auth::Office() || Auth::user()->profile()->id == $doctor->id) {

      $data = request()->validate([
        'name' => 'required|string|max:255',
        'telephone' => 'required|string|max:20',
        'sex' => 'required|string|max:1',
        'birthdate' => 'required',

        'address' => 'required|string|max:255',
        'postalCode' => 'required|string|max:7',
        'city' => 'required|string|max:255',
        'country' => 'required|string|max:255',

        //
        'especialidad.*' => 'required',
        'schedule' => 'required',
        'office_id' => 'required',
        'inTime' => 'required',
        'outTime' => 'required',

      ]);
 
      $doctor->specialities()->detach();


      $especialidades = $request->input('especialidad');
      for ($i = 0; $i < count($especialidades); $i++) {
        $speciality_id = $especialidades[$i];

        echo $speciality_id . " ";
        $doctor->specialities()->attach($speciality_id);
      }




      //Editar médico


      $doctor->schedule = $data['schedule'];
      $doctor->inTime = $data['inTime'];
      $doctor->outTime = $data['outTime'];
      $doctor->office_id = $data['office_id'];

      $doctor->address = $data['address'];
      $doctor->postalCode = $data['postalCode'];
      $doctor->city = $data['city'];
      $doctor->country = $data['country'];





      $doctor->save();


  

      $user = $doctor->user();

      $user->name = $data['name'];
      $user->telephone = $data['telephone'];
      $user->sex = strtolower($data['sex']);
      $user->birthdate = $data['birthdate'];


      $user->save();


 

      return redirect('/doctor/' . $doctor->id)->with('success', '¡El médico ha sido actualizado con éxito!');
    }
    return view('admin');
  }

  //Eliminar doctor
  public function destroy(Doctor $doctor)
  {
    if (Auth::Office()) {

      $doctor->delete();
      return redirect('/doctor')->with('success', '¡El médico ha sido eliminado con éxito!');
    }
    return view('admin');
  }
}
