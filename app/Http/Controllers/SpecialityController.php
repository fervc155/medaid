<?php

namespace App\Http\Controllers;

use App\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function index()
    {

    	$specialities = Speciality::All();

    	return view('hospital.speciality.indexSpeciality', compact('specialities'));
    }

    public function store(Request $request)
    {

    	$especialidad = new Speciality();

    	$especialidad->name = $request->input('name');
    	$especialidad->cost = $request->input('cost');
    	$especialidad->save();


    return back()->with('success','¡Especialidad Agregada con Exito!');

    }

    public function show($id)
    {

    	$speciality = Speciality::find($id);

   
    return view('hospital.speciality.showSpeciality', compact('speciality'))->with('doctors',$speciality->doctors);

    }

    public function update(Request $request)
    {

    	$especialidad = Speciality::find($request->input('id'));
    	$especialidad->cost = $request->input('cost');

    	$especialidad->name = $request->input('name');
    	$especialidad->save();


    return back()->with('success','¡Especialidad Actualizada con Exito!');

    }


    public function destroy(Request $request)
    {

    	$especialidad = Speciality::find($request->input('id'));



    	$especialidad->delete();

   		 return back()->with('success','¡Especialidad eliminada con Exito!');


    }
}
