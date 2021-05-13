<?php

namespace App\Http\Controllers;

use App\Speciality;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;

class SpecialityController extends Controller
{
    public function index()
    {

        if (Auth::user()->Patient()) {


            $specialities = Speciality::All();

            return view('hospital.speciality.indexSpeciality', compact('specialities'));
        }

        return view('admin');
    }

    public function store(Request $request)
    {
      $data = request()->validate([
        'name' => 'required|string|max:255',
       
        

    ]);
      $especialidad = new Speciality();

      $especialidad->name = $data['name'];
    

      $especialidad->save();


      return back()->with('success', '¡Especialidad Agregada con Exito!');
  }

  public function show($id)
  {

    $speciality = Speciality::find($id);



    return view('hospital.speciality.showSpeciality', compact('speciality'))->with('doctors', $speciality->doctors);
}

public function update(Request $request)
{
      $data = request()->validate([
        'name' => 'required|string|max:255',
       
        

    ]);
  $especialidad = Speciality::find($request->input('id'));
      $especialidad->name = $data['name'];
      

  $especialidad->save();


  return back()->with('success', '¡Especialidad Actualizada con Exito!');
}


public function destroy(Request $request)
{

    $especialidad = Speciality::find($request->input('id'));



    $especialidad->delete();

    return back()->with('success', '¡Especialidad eliminada con Exito!');
}
}
