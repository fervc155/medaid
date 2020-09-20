<?php

namespace App\Http\Controllers;

use App\Crud;
use App\Office;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class OfficeController extends Controller
{
    //Lista de consultorios
  public function index()
  {

    if (Auth::Patient()) {

      $offices = Office::active();


       return view('hospital.office.indexOffice', compact('offices'));
    }
    return view('admin');
  }

    //Agregar consultorio
  public function create()
  {
    if (Auth::Admin()) {


      return view('hospital.office.createOffice');
    }
    return view('admin');
  }

    //Almacenar consultorio
  public function store(Request $request)
  {
    if (Auth::Admin()) {



      $data = request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'telephone' => 'required|string|max:20',
        'sex' => 'required|string|max:1',
        'image' => 'required',
        'password' => 'required|string|min:6|confirmed',
        'address' => 'required|string|max:255',
        'birthdate' => 'required',
        'postalCode' => 'required|string|max:7',
        'city' => 'required|string|max:255',
        'country' => 'required|string|max:255',

            //
        'map' => 'required',
        'name_office' => 'required',

      ]);

      $ruta_imagen =  $data['image']->store('patients', 'public');



            //Crear consultorio
      $office = new Office;
      $office->name = $data['name_office'];
      $office->address = $data['address'];
      $office->postalCode = $data['postalCode'];
      $office->city = $data['city'];
      $office->country = $data['country'];
      $office->map = $data['map'];

      $office->save();

      Crud::newUser($data, 'office', $office->id, $ruta_imagen);

      return redirect('/office')->with('success', '¡El consultorio ha sido agregado con éxito!');
    }

    return view('admin');
  }
 
 
    //Mostrar información
  public function show($id)
  {
    $office = Office::find($id);

    if (Auth::Patient()) {

      return view('hospital.office.showOffice', compact('office'))
      ->with('doctors', $office->doctors);
    }
    return view('admin');
  }

    //Actualizar
  public function edit($id)
  {
    if (Auth::Office()) {




      if (Auth::isAdmin() || Auth::UserId() == $id) {
        $office = Office::find($id);
        return view('hospital.office.editOffice', compact('office'));
      }
    }
    return view('admin');
  }

    //Método update
  public function update(Request $request, Office $office)
  {

     
       $data = request()->validate([
        'name' => 'required|string|max:255',
         'birthdate' => 'required',
        'telephone' => 'required|string|max:20',
        'sex' => 'required|string|max:1',

        'postalCode' => 'required|string|max:7',
        'city' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        
        'name_office' => 'required|string|max:255',
        'map' => 'required|string|max:255',


      ]);


 





       $office->address = $data['address'];
      $office->postalCode = $data['postalCode'];
      $office->city = $data['city'];
      $office->country = $data['country'];
      $office->map = $data['map'];
      $office->name = $data['name_office'];
 




      $office->save();


 

      $user = $office->user();

      $user->name = $data['name'];
      $user->telephone = $data['telephone'];
      $user->sex = strtolower($data['sex']);
      $user->birthdate = $data['birthdate'];


      $user->save();





      return redirect('/office/' . $office->id)->with('success', '¡El consultorio ha sido actualizado con éxito!');
    }
  }
 