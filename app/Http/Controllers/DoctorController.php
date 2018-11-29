<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    //Lista de doctores
    public function index()
    {           
        $doctors = Doctor::all(); //Para ordenar los doctores por orden alfabético
        return view('hospital.doctor.indexDoctors', compact('doctors'));
    }

    //Crear doctores
    public function create()
    {
        return view('hospital.doctor.createDoctor');
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
        $doctor->especialidad = $request->input('especialidad');
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
        return view('hospital.doctor.editDoctor', compact('doctor'));
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
        $doctor->especialidad = $request->input('especialidad');
        $doctor->save();

        return redirect('/doctor');
    }

    //Eliminar doctor
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect('/doctor')->with('success', '¡El médico ha sido eliminado con éxito!');
    }
}
