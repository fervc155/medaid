<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Office;
use App\Options;
use App\Crud;
use App\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DoctorController extends Controller
{
  //Lista de doctores
  public function index()
  { 


    if(Auth::Patient()) 
    {


      $doctors = Doctor::all();
      return view('hospital.doctor.indexDoctors', compact('doctors'));
    } 
    return view('admin');


  }

  //Crear doctores
  public function create()
  {
   if(Auth::Office())
   {

    $defaultImg= new Options();
    $defaultImg = $defaultImg->UserDefault();

    $offices = Office::all(); 
    $specialities = Speciality::all();
    return view('hospital.doctor.createDoctor',compact('offices','specialities','defaultImg'));
  }
  return view('admin');

}



  //Almacenar doctor
public function store(Request $request)
{
  if(Auth::Office())
  {


    $data=request()->validate([
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
     'schedule'=>'required',
     'office_id'=>'required',
     'inTime'=>'required',
     'outTime'=>'required',

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

    for($i=0;$i<count($especialidades);$i++)
    {
      $speciality_id =$especialidades[$i];

      echo $speciality_id." ";
      $doctor->specialities()->attach( $speciality_id);

    }


    //imagen
    $ruta_imagen =  $data['image']->store('patients','public');


    Crud::newUser($data,'doctor',$doctor->id,$ruta_imagen);



    return redirect('/doctor')->with('success', '¡El médico ha sido agregado con éxito!');
  }    
  return view('admin');
}

  //Mostrar información de doctor
public function show($id)
{

  $doctor = Doctor::find($id);


  if(Auth::Patient())
  {







    return view('hospital.doctor.showDoctor', compact('doctor'))
    ->with('patients', $doctor->patients)
    ->with('appointments', $doctor->appointments);
  }

  return view('admin');

}

  //Actualizar doctor
public function edit( $id)
{

  $doctor = Doctor::find($id);






  if( Auth::isAdmin() ||  Auth::user()->profile()->id == $id  || (Auth::isOffice() && Auth::user()->profile()->id == $doctor->office_id    ))
  {

    $offices = Office::all();
    $specialities = Speciality::all();
    return view('hospital.doctor.editDoctor', compact('doctor','specialities','offices'));
  }
  return view('admin');

}

  //Método update
public function update(Request $request)
{

  if(Auth::Doctor())
  {



    $this->validate($request, [
      'name'=>'required',
      'doctor_id',
      'birthdate'=>'required',
      'telephoneNumber'=>'required',
      'turno'=>'required',
      'sexo'=>'required',
      'cedula'=>'required',
      'especialidad'=>'required'
    ]);



    $doctor = Doctor::find($request->input('doctor_id'));

    $doctor->specialities()->detach();


    $especialidades = $request->input('especialidad');
    for($i=0;$i<count($especialidades);$i++)
    {
      $speciality_id =$especialidades[$i];

      echo $speciality_id." ";
      $doctor->specialities()->attach( $speciality_id);

    }



    //Editar médico
    $doctor->name = $request->input('name');
    $doctor->birthdate = $request->input('birthdate');
    $doctor->telephoneNumber = $request->input('telephoneNumber');
    $doctor->turno = $request->input('turno');
    $doctor->sexo = $request->input('sexo');
    $doctor->cedula = $request->input('cedula');

    $doctor->office_id = $request->input('office_id');
    $doctor->inTime = $request->input('inTime');
    $doctor->outTime = $request->input('outTime');

    $doctor->save();

    return redirect('/doctor/'.$doctor->id)->with('success','¡El médico ha sido actualizado con éxito!');

  }
  return view('admin');

}

  //Eliminar doctor
public function destroy(Doctor $doctor)
{
  if(Auth::Office())
  {

    $doctor->delete();
    return redirect('/doctor')->with('success', '¡El médico ha sido eliminado con éxito!');
  } 
  return view('admin');


}
}
