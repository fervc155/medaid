<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('hospital.doctor.indexDoctors', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hospital.doctor.createDoctor');
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
        $doctor->especialidad = $request->input('especialidad');
        $doctor->save();

        return redirect('/doctor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('hospital.doctor.showDoctor', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view('hospital.doctor.editDoctor', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
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
        //$doctor = Doctor::find($doctor);    es así para editar?
        $doctor->name = $request->input('name');
        $doctor->birthdate = $request->input('birthdate');
        $doctor->telephoneNumber = $request->input('telephoneNumber');
        $doctor->turno = $request->input('turno');
        $doctor->sexo = $request->input('sexo');
        $doctor->cedula = $request->input('cedula');
        $doctor->especialidad = $request->input('especialidad');
        $doctor->save();

        return redirect('/doctor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect('/doctor');
    }
}
