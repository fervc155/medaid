<?php

namespace App\Http\Controllers;
use File;
use App\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class OfficeController extends Controller
{
    //Lista de consultorios
    public function index()
    {

        if(Auth::Patient())
        {

            $offices = Office::orderBy('id', 'asc')->get();
            return view('hospital.office.indexOffice', compact('offices'));
        }
        return view('admin');

    }

    //Agregar consultorio
    public function create()
    {
        if(Auth::Admin())
        {


            return view('hospital.office.createOffice');
        }
        return view('admin');

    }

    //Almacenar consultorio
    public function store(Request $request)
    {
        if(Auth::Admin())
        {


            $this->validate($request, [
                'name'=>'required',
                'address'=>'required',
                'postalCode'=>'required',
                'city'=>'required',
                'country'=>'required',
                'image'=>'image|nullable|max:1999'
            ]);


            $file = $request->file('image');
            $path = public_path().'/splash/img/office';
            $fileName= uniqid(). $file->getClientOriginalName();
            $move = $file->move($path, $fileName);

        //Crear consultorio
            $office = new Office;
            $office->name = $request->input('name');
            $office->address = $request->input('address');
            $office->postalCode = $request->input('postalCode');
            $office->city = $request->input('city');
            $office->country = $request->input('country');
            if ($move)
            {
                $office->image= $fileName;
            }

            $office->save();

            return redirect('/office')->with('success', '¡El consultorio ha sido agregado con éxito!');
        }

        return view('admin');

    }

    //Mostrar información
    public function show($id)
    {
        if(Auth::Patient())
        {

            $office = Office::find($id);
            return view('hospital.office.showOffice', compact('office'))
            ->with('doctors', $office->doctors);
        }
        return view('admin');

    }

    //Actualizar
    public function edit($id)
    {
        if(Auth::Office())
        {


          if(Auth::UserId() != $id)
          {
            return view('admin');
        }

        $office = Office::find($id);
        return view('hospital.office.editOffice', compact('office'));
    }
    return view('admin');

}

    //Método update
public function update(Request $request, Office $office)
{

    if(Auth::Office())
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

        //Si la petición contiene un archivo de imagen, ésta se asignará
        //al consultorio, utilizando el nombre de archivo generado anteriormente
        if($request->hasFile('image'))
        {
            $office->image = $fileNameToStore;
        }
        $office->save();

        return redirect('/office')->with('success', '¡El consultorio ha sido actualizado con éxito!');
    }
    return view('admin');

}

    //Eliminar consultorio
public function destroy(Office $office)
{

    if(Auth::Admin())
    {

        //Si la imagen no es no 'noimage' (nuestra imagen predeterminada),
        //entonces será eliminada del almacenamiento
        if($office->image != 'noimage.png')
        {
            Storage::delete('public/images/'.$office->image);
        }
        $office->delete();
        return redirect('/office')->with('success', 'El consultorio ha sido eliminado con éxito.');
    }
    return view('admin');

}

}
