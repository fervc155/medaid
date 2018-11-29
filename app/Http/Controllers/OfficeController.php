<?php

namespace App\Http\Controllers;

use App\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficeController extends Controller
{
    //Lista de consultorios
    public function index()
    {
        $offices = Office::orderBy('id', 'asc')->get();
        return view('hospital.office.indexOffice', compact('offices'));
    }

    //Agregar consultorio
    public function create()
    {
        return view('hospital.office.createOffice');
    }

    //Almacenar consultorio
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'address'=>'required',
            'postalCode'=>'required',
            'city'=>'required',
            'country'=>'required',
            'image'=>'image|nullable|max:1999'
        ]);

        //Subir archivo
        if($request->hasFile('image'))
        {
            //Obtener nombre de archivo con extensión
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Obtener sólo el nombre del archivo
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); //php
            //Obtener sólo la extensión
            $extension = $request->file('image')->getClientOriginalExtension();
            //Nombre de archivo a guardar
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Subir imagen
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore); //la guarda en la carpeta public con el nombre fileNameToStore
        } else {
            $fileNameToStore = 'noimage.png';
        }

        //Crear consultorio
        $office = new Office;
        $office->name = $request->input('name');
        $office->address = $request->input('address');
        $office->postalCode = $request->input('postalCode');
        $office->city = $request->input('city');
        $office->country = $request->input('country');
        $office->image = $fileNameToStore;
        $office->save();

        return redirect('/office')->with('success', '¡El consultorio ha sido agregado con éxito!');
    }

    //Mostrar información
    public function show(Office $office)
    {
        return view('hospital.office.showOffice', compact('office'))
                ->with('doctors', $office->doctors);
    }

    //Actualizar
    public function edit(Office $office)
    {
        return view('hospital.office.editOffice', compact('office'));
    }

    //Método update
    public function update(Request $request, Office $office)
    {
        $this->validate($request, [
            'name'=>'required',
            'address'=>'required',
            'postalCode'=>'required',
            'city'=>'required',
            'country'=>'required',
            'image'=>'image|nullable|max:1999'
        ]);

        //Subir archivo
        if($request->hasFile('image'))
        {
            //Obtener nombre de archivo con extensión
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Obtener sólo el nombre del archivo
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); //php
            //Obtener sólo la extensión
            $extension = $request->file('image')->getClientOriginalExtension();
            //Nombre de archivo a guardar
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Subir imagen
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore); //la guarda en la carpeta public con el nombre fileNameToStore
        } 

        //Actualizar consultorio
        $office->name = $request->input('name');
        $office->address = $request->input('address');
        $office->postalCode = $request->input('postalCode');
        $office->city = $request->input('city');
        $office->country = $request->input('country');
        if($request->hasFile('image'))
        {
            $office->image = $fileNameToStore;
        }
        $office->save();

        return redirect('/office')->with('success', '¡El consultorio ha sido actualizado con éxito!');
    }

    //Eliminar consultorio
    public function destroy(Office $office)
    {
        if($office->image != 'noimage.png')
        {
            Storage::delete('public/images/'.$office->image);
        }
        $office->delete();
        return redirect('/office')->with('success', 'El consultorio ha sido eliminado con éxito.');
    }

}
