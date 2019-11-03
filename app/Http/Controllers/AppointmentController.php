<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Condition;
use App\Conditions;
use App\Doctor;
use App\Office;
use App\Options;
use App\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //Lista de citas
    public function index()
    {


        $options = new Options();
        $appointments = Appointment::all();

        return view('hospital.appointment.indexAppointment', compact('appointments','options'));
    }

    //Agregar cita
    public function create()
    {

        $offices = Office::All();
        $doctors= Doctor::All();
        $patients = Patient::All();

        return view('hospital.appointment.createAppointment', compact('offices','doctors','patients'));
    }

    //Método store, para almacenar cita
    public function store(Request $request)
    {
        $this->validate($request, [
            'date'=>'required',
            'time'=>'required',
            'cost'=>'required',
            'description'=>'required',
            'doctor_id'=>'required',
            'patient_dni'=>'required'
        ]);

        //Crear cita
        $appointment = new Appointment;
        $appointment->date = $request->input('date');
        $appointment->time = $request->input('time');
        $appointment->cost = $request->input('cost');
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->patient_dni = $request->input('patient_dni');
        $appointment->description = $request->input('description');
        $appointment->save();

        return redirect('/appointment')->with('success', '¡La cita ha sido creada con éxito!');
    }

    //Información de cita
    public function show(Appointment $appointment)
    {
        $conditions = Condition::all();
        return view('hospital.appointment.showAppointment', compact('appointment', 'conditions'));
    }

    //Actualizar cita
    public function edit(Appointment $appointment)
    {
        $offices = Office::All();
        $doctors= Doctor::All();
        $patients = Patient::All();
        $conditions = Condition::All();


        return view('hospital.appointment.editAppointment', compact('appointment','offices','doctors','patients','conditions'));


    }

    //Método update 
    public function update(Request $request, Appointment $appointment)
    {
        $this->validate($request, [
            'date'=>'required',
            'time'=>'required',
            'cost'=>'required',
            'description'=>'required',
            'doctor_id'=>'required',
            'patient_dni'=>'required',
            'condition'=>'required'
        ]);

        //Actualizar cita
        $appointment->date = $request->input('date');
        $appointment->time = $request->input('time');
        $appointment->cost = $request->input('cost');
        $appointment->description = $request->input('description');
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->patient_dni = $request->input('patient_dni');
        $appointment->comments = $request->input('comments');
        $appointment->condition_id = $request->input('condition');
        $appointment->save();

        return redirect('/appointment/'.$appointment->id)->with('success', '¡La cita ha sido actualizada con éxito!');
    }

    //Eliminar cita
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect('/appointment')->with('success', 'La cita ha sido eliminada con éxito.');
    }

    //Atender cita
    public function complete(Appointment $appointment)
    {
        $conditions = new Conditions;
        $appointment->condition_id =  $conditions->id('completed');
        $appointment->save();

        return back()->with('success', '¡La cita ha sido atendida con éxito!');
    }

    public function rejected(Appointment $appointment)
    {
        $conditions = new Conditions;
        $appointment->condition_id =  $conditions->id('rejected');
        $appointment->save();

        return back()->with('success', '¡La cita ha sido rechazada!');
    }

    public function accepted(Appointment $appointment)
    {
        $conditions = new Conditions;
        $appointment->condition_id =  $conditions->id('accepted');
        $appointment->save();

        return back()->with('success', '¡La cita ha sido Aceptada!');
    }
    public function cancelled(Appointment $appointment)
    {
        $conditions = new Conditions;
        $appointment->condition_id =  $conditions->id('cancelled');
        $appointment->save();

        return back()->with('success', '¡La cita ha sido cancelada!');
    }
        public function pending(Appointment $appointment)
    {
        $conditions = new Conditions;
        $appointment->condition_id =  $conditions->id('pending');
        $appointment->save();

        return back()->with('success', '¡La cita ha sido marcada como pendiente!');
    }
        public function late(Appointment $appointment)
    {
        $conditions = new Conditions;
        $appointment->condition_id =  $conditions->id('late');
        $appointment->save();

        return back()->with('success', '¡La cita ha sido atenidida con retrazo!');
    }
    public function lost(Appointment $appointment)
    {
        $conditions = new Conditions;
        $appointment->condition_id =  $conditions->id('lost');
        $appointment->save();

        return back()->with('success', '¡La cita ha sido marcada como perdida!');
    }



}
