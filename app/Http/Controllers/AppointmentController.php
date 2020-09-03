<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Condition;
use App\Conditions;
use App\Speciality;
use App\Doctor;
use App\Office;
use App\Patient;
use App\Privileges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
  //Lista de citas
  public function index()
  {
    if (Auth::isPatient()) {
      $appointments = Appointment::where('patient_dni', '=', Auth::UserId())->get();


      return view('hospital.appointment.indexAppointment', compact('appointments'));
    }



    if (Auth::isDoctor()) {
      $appointments = Appointment::where('doctor_id', '=', Auth::UserId())->get();

      return view('hospital.appointment.indexAppointment', compact('appointments'));
    }




    if (Auth::isOffice()) {


      $appointments =  Appointment::join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
        ->select('appointments.*')
        ->where('doctors.office_id', Auth::UserId())
        ->get();




      return view('hospital.appointment.indexAppointment', compact('appointments'));
    }

    if (Auth::Admin()) {
      $appointments = Appointment::all();
      return view('hospital.appointment.indexAppointment', compact('appointments'));
    }



    return view('admin');
  }

  //Agregar cita
  public function create($id = '', $spe = '')
  {






    $patients = Patient::all();
    $offices = Office::all();


    if (Auth::isDoctor()) {
      $id = Auth::UserId();
    }



    if ($id != '' && $spe != '') {
      $_doctor = Doctor::find($id);
      $_speciality_id = $spe;

      return view('hospital.appointment.createAppointment', compact('_doctor', 'patients', 'offices', '_speciality_id'));
    }

    if ($id != '') {
      $_doctor = Doctor::find($id);



      return view('hospital.appointment.createAppointment', compact('_doctor', 'patients', 'offices'));
    } else {

      return view('hospital.appointment.createAppointment', compact('patients', 'offices'));
    }
  }

  //Método store, para almacenar cita
  public function store(Request $request)
  {
    $this->validate($request, [
      'date' => 'required',
      'time' => 'required',
      'speciality_id' => 'required',
      'description' => 'required',
      'doctor_id' => 'required',
      'patient_dni' => 'required',

    ]);

    //Crear cita
    $appointment = new Appointment;


    $appointment->date = $request->input('date');
    $appointment->time = $request->input('time');
    $appointment->doctor_id = $request->input('doctor_id');
    $appointment->speciality_id = $request->input('speciality_id');
    $appointment->cost = Speciality::find($appointment->speciality_id)->first()->cost;

    $appointment->patient_dni = $request->input('patient_dni');

    $appointment->description = $request->input('description');
    $appointment->condition_id = Conditions::id('pending');
    $appointment->save();


    return redirect('/appointment')->with('success', '¡La cita ha sido creada con éxito!');
  }

  //Información de cita
  public function show($id)
  {

    $appointment = Appointment::find($id);

    if (Auth::isPatient()) {
      if (Auth::UserId() == $appointment->patient_dni) {
        return view('hospital.appointment.showAppointment', compact('appointment'))->with('patient', $appointment->patient);
      }
    }


    if (Auth::isOffice()) {
      if (Auth::UserId() == $appointment->doctor->office_id) {
        return view('hospital.appointment.showAppointment', compact('appointment'))->with('patient', $appointment->patient);
      }
    }



    if (Auth::isDoctor()) {

      $patients =  Patient::join('appointments', 'appointments.patient_dni', '=', 'patients.dni')
        ->select('patients.*', 'appointments.*')
        ->where('appointments.doctor_id', Auth::UserId())
        ->get();

      if (Auth::UserId() == $appointment->doctor_id) {
        return view('hospital.appointment.showAppointment', compact('appointment'))->with('patients', $appointment->patient);
      }

      foreach ($patients as $patient) {
        foreach ($patient->appointments as $ap) {
          if ($ap->id == $appointment->id) {
            return view('hospital.appointment.showAppointment', compact('appointment'))->with('patients', $appointment->patient);
          }
        }
      }

      return view('admin');
    }




    if (Auth::isOffice()) {

      if (Auth::UserId() == $appointment->doctor->office_id) {

        return view('hospital.appointment.showAppointment', compact('appointment'))->with('patients', $appointment->patient);
      }
    }

    if (Auth::Admin()) {




      return view('hospital.appointment.showAppointment', compact('appointment'))->with('patient', $appointment->patient);
    }

    return view('admin');
  }

  //Actualizar cita
  public function edit(Appointment $appointment)
  {

    if ($appointment->condition_id != Conditions::Id('pending')) {

      return back()->with('error', 'Solo se pueden editar las citas pendientes');
    }


    if (Auth::isPatient()) {
      if (Auth::UserId() != $appointment->patient_dni) {
        return view('admin');
      }
    }



    if (Auth::isDoctor()) {
      if (Auth::UserId() != $appointment->doctor_id) {
        return view('admin');
      }
    }




    if (Auth::isOffice()) {
      if (Auth::UserId() != $appointment->doctor->office_id) {
        return view('admin');
      }
    }



    if (Auth::Patient()) {





      $conditions = Condition::all();
      return view('hospital.appointment.editAppointment', compact('appointment', 'conditions'));
    }


    return view('admin');
  }

  //Método update 
  public function update(Request $request, Appointment $appointment)
  {

    if (Auth::Patient()) {

      $this->validate($request, [
        'date' => 'required',
        'time' => 'required',
        'description' => 'required',
        'appointment_id' => 'required'

      ]);


      $appointment = Appointment::find($request->input('appointment_id'));
      $appointment->date = $request->input('date');
      $appointment->time = $request->input('time');

      $appointment->description = $request->input('description');
      $appointment->save();

      return redirect('/appointment')->with('success', '¡La cita ha sido actualizada con éxito!');
    }

    return view('admin');
  }

  //cancelar cita
  public function destroy(Appointment $appointment)
  {
    if (Auth::Patient()) {

      $appointment->condition_id = Conditions::Id('cancelled');
      $appointment->save();

      return redirect('/appointment')->with('success', '¡La cita ha sido cancelada con éxito!');
    }
    return view('admin');
  }

  //cancelar cita
  public function cancelled(Appointment $appointment)
  {
    if (Auth::Patient()) {
      $appointment->condition_id = Conditions::Id('cancelled');
      $appointment->save();

      return redirect('/appointment')->with('success', '¡La cita ha sido cancelada con éxito!');
    }
    return view('admin');
  }


  //Atender cita
  public function complete(Appointment $appointment)
  {
    if (Auth::Patient()) {
      $appointment->condition_id = Conditions::Id('completed');
      $appointment->save();

      return redirect('/appointment')->with('success', '¡La cita ha sido atendida con éxito!');
    }
    return view('admin');
  }

  //acpetar cita
  public function accepted(Appointment $appointment)
  {
    if (Auth::Patient()) {
      $appointment->condition_id = Conditions::Id('accepted');
      $appointment->save();

      return redirect('/appointment')->with('success', '¡La cita ha sido aceptada con éxito!');
    }
  }

  //rechazar cita
  public function rejected(Appointment $appointment)
  {
    if (Auth::Patient()) {

      $appointment->condition_id = Conditions::Id('rejected');
      $appointment->save();

      return redirect('/appointment')->with('success', '¡La cita ha sido rechazada con éxito!');
    }
    return view('admin');
  }

  //pendiente cita
  public function pending(Appointment $appointment)
  {
    if (Auth::Patient()) {
      $appointment->condition_id = Conditions::Id('pending');
      $appointment->save();

      return redirect('/appointment')->with('success', '¡La cita ha sido rechazada con éxito!');
    }
    return view('admin');
  }
  //tarde cita
  public function late(Appointment $appointment)
  {
    if (Auth::Patient()) {
      $appointment->condition_id = Conditions::Id('late');
      $appointment->save();

      return redirect('/appointment')->with('success', '¡La cita ha sido rechazada con éxito!');
    }
    return view('admin');
  }
  //perdida cita
  public function lost(Appointment $appointment)
  {
    if (Auth::Patient()) {
      $appointment->condition_id = Conditions::Id('lost');
      $appointment->save();

      return redirect('/appointment')->with('success', '¡La cita ha sido rechazada con éxito!');
    }
    return view('admin');
  }


  /*==========================================
  =            actualizar estados            =
  ==========================================*/

  /*=====  End of actualizar estados  ======*/
}
