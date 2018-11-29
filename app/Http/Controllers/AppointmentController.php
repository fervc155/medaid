<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //Lista de citas
    public function index()
    {
        $appointments = Appointment::with(['doctor:id,name', 'patient:dni,name', 'office:id,name'])->get();

        return view('hospital.appointment.indexAppointment', compact('appointments'));
    }

    //Agregar cita
    public function create()
    {
        return view('hospital.appointment.createAppointment');
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
            'patient_dni'=>'required',
            'office_id'=>'required'
        ]);

        //Crear cita
        $appointment = new Appointment;
        $appointment->date = $request->input('date');
        $appointment->time = $request->input('time');
        $appointment->cost = $request->input('cost');
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->patient_dni = $request->input('patient_dni');
        $appointment->office_id = $request->input('office_id');
        $appointment->description = $request->input('description');
        $appointment->completed = false;
        $appointment->save();

        return redirect('/appointment')->with('success', '¡La cita ha sido creada con éxito!');
    }

    //Información de cita
    public function show(Appointment $appointment)
    {
        return view('hospital.appointment.showAppointment', compact('appointment'));
    }

    //Actualizar cita
    public function edit(Appointment $appointment)
    {
        return view('hospital.appointment.editAppointment', compact('appointment'));
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
            'office_id'=>'required',
            'completed'=>'required'
        ]);

        //Actualizar cita
        $appointment->date = $request->input('date');
        $appointment->time = $request->input('time');
        $appointment->cost = $request->input('cost');
        $appointment->description = $request->input('description');
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->patient_dni = $request->input('patient_dni');
        $appointment->office_id = $request->input('office_id');
        $appointment->comments = $request->input('comments');
        $appointment->completed = $request->input('completed');
        $appointment->save();

        return redirect('/appointment')->with('success', '¡La cita ha sido actualizada con éxito!');
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
        $appointment->completed = true;
        $appointment->save();

        return redirect('/appointment')->with('success', '¡La cita ha sido atendida con éxito!');
    }
}
