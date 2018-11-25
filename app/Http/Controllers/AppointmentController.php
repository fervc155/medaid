<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::with(['doctor:id,name', 'patient:dni,name', 'office:id,name'])->paginate(10);

        return view('hospital.appointment.indexAppointment', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hospital.appointment.createAppointment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('hospital.appointment.showAppointment', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return view('hospital.appointment.editAppointment', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
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

        return redirect('/appointment')->with('success', '¡La cita ha sido creada con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect('/appointment')->with('success', 'La cita ha sido eliminada con éxito.');
    }
}
