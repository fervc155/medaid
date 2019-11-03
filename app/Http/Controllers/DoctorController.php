<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Office;
use App\Options;
use App\Speciality;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
  //Lista de doctores
  public function index()
  {           

        $doctors = Doctor::with(['speciality' => function ($query) {
      $query->has('doctors');
    }])->get();

    return view('hospital.doctor.indexDoctors', compact('doctors'));
  }

  //Crear doctores
  public function create()
  {
      $defaultImg= new Options();
    $defaultImg = $defaultImg->UserDefault();
    
    $offices = Office::all(); 
    $specialities = Speciality::all();
    return view('hospital.doctor.createDoctor',compact('offices','specialities','defaultImg'));
  }

  //Almacenar doctor
  public function store(Request $request)
  {
    $this->validate($request, [
      'name'=>'required',
      'birthdate'=>'required',
      'telephoneNumber'=>'required',
      'turno'=>'required',
      'sexo'=>'required',
      'cedula'=>'required',
      'especialidad'=>'required'
    ]);

    //Crear médico
    $doctor = new Doctor;
    $doctor->name = $request->input('name');
    $doctor->birthdate = $request->input('birthdate');
    $doctor->telephoneNumber = $request->input('telephoneNumber');
    $doctor->turno = $request->input('turno');
    $doctor->sexo = $request->input('sexo');
    $doctor->cedula = $request->input('cedula');
    $doctor->speciality_id = $request->input('especialidad');
    $doctor->office_id = $request->input('office_id');
    $doctor->inTime = $request->input('inTime');
    $doctor->onTime = $request->input('onTime');

    $doctor->save();

    return redirect('/doctor')->with('success', '¡El médico ha sido agregado con éxito!');
  }

  //Mostrar información de doctor
  public function show(Doctor $doctor)
  {
    return view('hospital.doctor.showDoctor', compact('doctor'))
        ->with('patients', $doctor->patients)
        ->with('offices', $doctor->offices)
        ->with('appointments', $doctor->appointments);
  }

  //Actualizar doctor
  public function edit(Doctor $doctor)
  {
    $offices = Office::all();
    $specialities = Speciality::all();
    return view('hospital.doctor.editDoctor', compact('doctor','specialities','offices'));
  }

  //Método update
  public function update(Request $request, Doctor $doctor)
  {
    $this->validate($request, [
      'name'=>'required',
      'birthdate'=>'required',
      'telephoneNumber'=>'required',
      'turno'=>'required',
      'sexo'=>'required',
      'cedula'=>'required',
      'especialidad'=>'required'
    ]);

    //Editar médico
    $doctor->name = $request->input('name');
    $doctor->birthdate = $request->input('birthdate');
    $doctor->telephoneNumber = $request->input('telephoneNumber');
    $doctor->turno = $request->input('turno');
    $doctor->sexo = $request->input('sexo');
    $doctor->cedula = $request->input('cedula');
    $doctor->speciality_id = $request->input('especialidad');

     $doctor->office_id = $request->input('office_id');
    $doctor->inTime = $request->input('inTime');
    $doctor->onTime = $request->input('onTime');

    $doctor->save();

    return redirect('/doctor')->with('success','¡El médico ha sido actualizado con éxito!');
  }

  //Eliminar doctor
  public function destroy(Doctor $doctor)
  {
    $doctor->delete();
    return redirect('/doctor')->with('success', '¡El médico ha sido eliminado con éxito!');
  }
}
