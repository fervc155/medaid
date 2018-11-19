<?php

namespace App\Http\Controllers;

use App\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::orderBy('id', 'asc')->paginate(10);
        return view('hospital.office.indexOffice', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hospital.office.createOffice');
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        return view('hospital.office.showOffice', compact('office'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        return view('hospital.office.editOffice', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
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

        return redirect('/office')->with('success', '¡El consultorio ha sido agregado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        if($office->image != 'noimage.png')
        {
            //Eliminar la imagen
            Storage::delete('public/images/'.$office->image);
        }
        $office->delete();
        return redirect('/office')->with('success', 'El consultorio ha sido eliminado con éxito.');
    }
}
