<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\User;
use App\Appointment;
use App\Office;
use App\Options;
use App\Patient;
use App\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class PatientController extends Controller
{
    //Lista de pacientes
  public function index()
  {



    if(Auth::isDoctor())
    {

      $patients1 = Doctor::find(Auth::UserId())->patients;
      $patients =  Patient::
      join('appointments','appointments.patient_dni','=','patients.dni')
      ->select('patients.*','appointments.*')
      ->where('appointments.doctor_id', Auth::UserId())
      ->get();



      $patients = $patients->merge($patients1);
      $patients = $patients->unique('dni');




      return view('hospital.patient.indexPatients', compact('patients'));


    }

    if(Auth::isOffice())
    {


      $doctors = Doctor::where('office_id', Auth::UserId())->get();


      $patients = collect();


      foreach ($doctors as $doctor)
      {


        $patients1 = Doctor::find($doctor->id)->patients;


        $patients2 =  Patient::
        join('appointments','appointments.patient_dni','=','patients.dni')
        ->select('patients.*','appointments.*')
        ->where('appointments.doctor_id', $doctor->id)
        ->get();

        $patients2 = $patients2->merge($patients1);
        $patients2 = $patients2->unique('dni');
        $patients = $patients->merge($patients2);



      }



      $patients = $patients->unique('dni');






      return view('hospital.patient.indexPatients', compact('patients'));


    }

    if(Auth::Admin())
    {

      $patients = Patient::with(['doctor' => function ($query) {
        $query->has('patients');
      }])->get();

      return view('hospital.patient.indexPatients', compact('patients'));
    }

    return view('admin');
  }

    //Agregar paciente
  public function create()
  {
    if(Auth::Office())
    {

      $defaultImg= new Options();
      $defaultImg = $defaultImg->UserDefault();


      $doctors = Doctor::All();

      return view('hospital.patient.createPatient',compact('doctors','defaultImg'));
    }

    return view('admin');
  }

    //Almacenar
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
       'curp' => 'required|string|max:20',
       'address' => 'required|string|max:255',
       'postalCode' => 'required|string|max:7',
       'city' => 'required|string|max:255',
       'country' => 'required|string|max:255',


     ]);


      $patient = new Patient();

      $patient->curp = $data['curp'];
      $patient->doctor_id =1;
   
      //address
      $patient->address = $data['address'];
      $patient->postalCode = $data['postalCode'];
      $patient->city = $data['city'];
      $patient->country = $data['country'];
   





      $patient->save();
      dd($patient);


      Crud::newUser($data,'patient',$patient->dni,$ruta_imagen);

      return redirect('/patient')->with('success', '¡El paciente ha sido agregado con éxito!');
    }

  //  return view('admin');
  }

    //Información de paciente
  public function show($id)
  {

    if (Auth::Patient()) {


      $patient = Patient::find($id);

      if(Auth::isPatient())
      {

        if (Auth::user()->id_user!=$id)
        {
          return view('admin');
        }

        $appointments =$patient->appointments;  
      }


      if(Auth::isDoctor() )
      {



       if($patient->doctor->id == Auth::UserId() )
       {

         $appointments = Appointment::where('doctor_id',Auth::UserId())->where('patient_dni',$patient->dni)->get();   

       }


     }

     if(Auth::Office())
     {



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





  if(Auth::isPatient())
  {

    if (Auth::user()->id_user!=$id)
    {
      return view('admin');
    }
    $offices = Office::All();
    return view('hospital.patient.editPatient', compact('patient','offices'));

  }




  if(Auth::Office())
  {



   $offices = Office::All();
   return view('hospital.patient.editPatient', compact('patient','offices'));

 }        
 return view('admin');
}

    //Método update
public function update(Request $request,  $id)
{

  if((Auth::isPatient() && Auth::user()->profile()->id == $id) || Auth::Office())
  {


    $data=request()->validate([
      'name' => 'required|string|max:255',
         //   'email' => 'required|string|email|max:255|unique:users',
      'curp' => 'required|string|max:20',
      'birthdate'=>'required',
      'telephone' => 'required|string|max:20',
      'sex' => 'required|string|max:1',
      'postalCode' => 'required|string|max:7',
      'city' => 'required|string|max:255',
      'country' => 'required|string|max:255',
      'doctor_id'=>'required',
       //     'image' => 'required',

      'address' => 'required|string|max:255',


    ]);


    $patient = Patient::find($id);






    $patient->curp = $data['curp'];
    $patient->address = $data['address'];
    $patient->postalCode = $data['postalCode'];
    $patient->city = $data['city'];
    $patient->country = $data['country'];
    $patient->doctor_id =$data['doctor_id'];





    $patient->save();


        //$ruta_imagen =  $data['image']->store('patients','public');


    $user = $patient->user();

    $user->name = $data['name'];
    $user->telephone = $data['telephone'];
    $user->sex = strtolower($data['sex']);
    $user->birthdate = $data['birthdate'];


    $user->save();



    

    return redirect('/patient/'.$id)->with('success', '¡El paciente ha sido actualizado con éxito!');
    
  }

  return view('admin');
}

public function updateLogin(Request $request,  $id)
{

  if((Auth::isPatient() && Auth::user()->profile()->id == $id) || Auth::Office())
  {


    $data=request()->validate([
     'email' => 'required|string|email|max:255',
     'password' => 'required|string|min:6',
     'newpassword' => 'required|string|min:6',

   ]);




    $patient = Patient::find($id);
    $user = $patient->user();



    if(Hash::check($data['password'], $patient->user()->password))
    {

      if($data['newpassword'] == $data['password'])
      {
       return  back()->with('error', 'La contraseña nueva debe ser diferente');    

     }



     $user->email = $data['email'];
     $user->password = bcrypt($data['newpassword']);


     $user->save();

     return redirect('/patient/'.$id)->with('success', '¡El paciente ha sido actualizado con éxito!');

   }

   return  back()->with('error', 'La contraseña no es correcta, ingresala para editar tus datos');    


 }

 return view('admin');
}

    //Método update
public function updateImage(Request $request,  $id)
{

  if((Auth::isPatient() && Auth::user()->profile()->id == $id) || Auth::Office())
  {


    $data=request()->validate([
      'image' => 'required',
    ]);


    $patient = Patient::find($id);


    $user = $patient->user();



    $ruta_imagen =  $data['image']->store('patients','public');

    unlink($user->Pathimg);

    $user = $patient->user();
    $user->image = $ruta_imagen;
    $user->save();

    return redirect('/patient/'.$id)->with('success', '¡El paciente ha sido actualizado con éxito!');
    
  }

  return view('admin');
}
        //Eliminar paciente
public function destroy(Patient $patient)
{
  if(Auth::Office())
  {

    $patient->delete();
    return redirect('/patient')->with('success', 'El paciente ha sido eliminado con éxito.');
  }
}
}
