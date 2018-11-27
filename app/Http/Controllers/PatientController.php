<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Además de recuperar a los pacientes, se seleccionarán los médicos que tengan pacientes
        $patients = Patient::with(['doctor' => function ($query) {
            $query->has('patients');
        }])->get();

        return view('hospital.patient.indexPatients', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hospital.patient.createPatient');
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
            'curp'=>'required',
            'birthdate'=>'required',
            'telephoneNumber'=>'required',
            'sex'=>'required',
            'address'=>'required',
            'postalCode'=>'required',
            'city'=>'required',
            'country'=>'required',
            'doctor_id'=>'required'
        ]);

        //Crear paciente
        $patient = new Patient;
        $patient->name = $request->input('name');
        $patient->curp = $request->input('curp');
        $patient->birthdate = $request->input('birthdate');
        $patient->telephoneNumber = $request->input('telephoneNumber');
        $patient->sex = $request->input('sex');
        $patient->address = $request->input('address');
        $patient->postalCode = $request->input('postalCode');
        $patient->city = $request->input('city');
        $patient->country = $request->input('country');
        $patient->doctor_id = $request->input('doctor_id');
        $patient->save();

        return redirect('/patient')->with('success', '¡El paciente ha sido agregado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('hospital.patient.showPatient', compact('patient'))
        ->with('doctor', $patient->doctor)
        ->with('appointments', $patient->appointments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('hospital.patient.editPatient', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $this->validate($request, [
            'name'=>'required',
            'curp'=>'required',
            'birthdate'=>'required',
            'telephoneNumber'=>'required',
            'sex'=>'required',
            'postalCode'=>'required',
            'city'=>'required',
            'country'=>'required',
            'doctor_id'=>'required'
        ]);

        //Editar paciente
        $patient->name = $request->input('name');
        $patient->curp = $request->input('curp');
        $patient->birthdate = $request->input('birthdate');
        $patient->telephoneNumber = $request->input('telephoneNumber');
        $patient->sex = $request->input('sex');
        $patient->address = $request->input('address');
        $patient->postalCode = $request->input('postalCode');
        $patient->city = $request->input('city');
        $patient->country = $request->input('country');
        $patient->doctor_id = $request->input('doctor_id');
        $patient->save();

        return redirect('/patient')->with('success', '¡El paciente ha sido actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect('/patient')->with('success', 'El paciente ha sido eliminado con éxito.');
    }
}
