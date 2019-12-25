<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Condition;
use App\Conditions;
use App\Doctor;
use App\Office;
use App\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //Lista de citas
    public function index()
    {
        $appointments = Appointment::all();

        return view('hospital.appointment.indexAppointment', compact('appointments'));
    }

    //Agregar cita
    public function create()
    {
        $patients = Patient::all();
        $offices= Office::all();
        $conditions = Condition::all();
        return view('hospital.appointment.createAppointment', compact('appointment','patients','offices','conditions'));
    }

    //Método store, para almacenar cita
    public function store(Request $request)
    {
        $this->validate($request, [
            'date'=>'required',
            'time'=>'required',
            
            'description'=>'required',
            'doctor_id'=>'required',
            'patient_dni'=>'required',
            
        ]);

        //Crear cita
        $appointment = new Appointment;


        $appointment->date = $request->input('date');
        $appointment->time = $request->input('time');
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->cost = Doctor::find($appointment->doctor_id)->first()->speciality->cost;
        $appointment->patient_dni = $request->input('patient_dni');
        
        $appointment->description = $request->input('description');
        $appointment->condition_id = Conditions::id('pending');
        $appointment->save();

        return redirect('/appointment')->with('success', '¡La cita ha sido creada con éxito!');
    }

    //Información de cita
    public function show(Appointment $appointment)
    {

     return view('hospital.appointment.showAppointment', compact('appointment'))->with('patients',$appointment->patient);

 }

    //Actualizar cita
 public function edit(Appointment $appointment)
 {
    $patients = Patient::all();
    $offices= Office::all();
    $conditions = Condition::all();
    return view('hospital.appointment.editAppointment', compact('appointment','patients','offices','conditions'));
}

    //Método update 
public function update(Request $request, Appointment $appointment)
{
    $this->validate($request, [
        'date'=>'required',
        'time'=>'required',
        'description'=>'required',
        'cost'=>'required',
        'doctor_id'=>'required',
        'patient_dni'=>'required',
        
    ]);

    
    $appointment->date = $request->input('date');
    $appointment->time = $request->input('time');
    $appointment->doctor_id = $request->input('doctor_id');
    $appointment->cost =  $request->input('cost');
    $appointment->patient_dni = $request->input('patient_dni');
    
    $appointment->description = $request->input('description');
    $appointment->condition_id = Conditions::id('pending');
    $appointment->save();
    return redirect('/appointment')->with('success', '¡La cita ha sido actualizada con éxito!');
}

    //cancelar cita
public function destroy(Appointment $appointment)
{
   $appointment->condition_id = Conditions::Id('cancelled');
   $appointment->save();

   return redirect('/appointment')->with('success', '¡La cita ha sido cancelada con éxito!');
}

        //cancelar cita
public function cancelled(Appointment $appointment)
{
   $appointment->condition_id = Conditions::Id('cancelled');
   $appointment->save();

   return redirect('/appointment')->with('success', '¡La cita ha sido cancelada con éxito!');
}


    //Atender cita
public function complete(Appointment $appointment)
{
    $appointment->condition_id = Conditions::Id('completed');
    $appointment->save();

    return redirect('/appointment')->with('success', '¡La cita ha sido atendida con éxito!');
}

        //acpetar cita
public function accepted(Appointment $appointment)
{
    $appointment->condition_id = Conditions::Id('accepted');
    $appointment->save();

    return redirect('/appointment')->with('success', '¡La cita ha sido aceptada con éxito!');
}

        //rechazar cita
public function rejected(Appointment $appointment)
{
    $appointment->condition_id = Conditions::Id('rejected');
    $appointment->save();

    return redirect('/appointment')->with('success', '¡La cita ha sido rechazada con éxito!');
}

          //pendiente cita
public function pending(Appointment $appointment)
{
    $appointment->condition_id = Conditions::Id('pending');
    $appointment->save();

    return redirect('/appointment')->with('success', '¡La cita ha sido rechazada con éxito!');
}
              //tarde cita
public function late(Appointment $appointment)
{
    $appointment->condition_id = Conditions::Id('late');
    $appointment->save();

    return redirect('/appointment')->with('success', '¡La cita ha sido rechazada con éxito!');
}
          //perdida cita
public function lost(Appointment $appointment)
{
    $appointment->condition_id = Conditions::Id('lost');
    $appointment->save();

    return redirect('/appointment')->with('success', '¡La cita ha sido rechazada con éxito!');
}






    /*==========================================
    =            actualizar estados            =
    ==========================================*/
    
    
    
    /*=====  End of actualizar estados  ======*/
    
}
