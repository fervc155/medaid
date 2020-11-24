<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Crud;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        if(!Auth::user()->isAdmin())
            return view('admin');




        return view('hospital.admin.createAdmin');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth::user()->admin())
            return view('admin');




      $data = request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'telephone' => 'required|string|max:20',
        'sex' => 'required|string|max:1',
        'image' => 'required|file',
        'password' => 'required|string|min:6|confirmed',
        'birthdate' => 'required|date',
  
        ]);

  

        $admin  = new Admin;
        $admin->save();
      //imagen
        $ruta_imagen =  $data['image']->store('admins', 'public');


        Crud::newUser($data, 'admin', $admin->id, $ruta_imagen);

    Notification::toUser($admin->user(), array(
            'subject'=>"Se ha creado tu perfil administrador",
            'text'=>[
                
                'Para ver sus detalles ingresa al link que hemos enviado',
                'Correo: '.$data['email'],
                'Password: '.$data['password']
                
                

            ],
            'url'=> url('/login'),
            'btnText'=>'Iniciar sesion'
        ));



        return redirect($admin->profileUrl)->with('success','Administrador creado correctamente');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {

        return view('hospital.admin.showAdmin', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('hospital.admin.editAdmin', compact('admin'));
    }

  public function update(Request $request, Admin $admin)
  {

    if (Auth::user()->admin()  ) {

      $data = request()->validate([
        'name' => 'required|string|max:255',
        'telephone' => 'required|string|max:20',
        'sex' => 'required|string|max:1',
        'birthdate' => 'required|date',
            'email' => 'required|string|email|max:255',

      ]);
  
 

 
 




      $admin->save();


  

      $user = $admin->user();

      $user->name = $data['name'];
      $user->telephone = $data['telephone'];
      $user->sex = strtolower($data['sex']);
      $user->birthdate = $data['birthdate'];

      $user->email = $data['email'];

      $user->save();


 

      return redirect('/admin/' . $admin->id)->with('success', '¡El admin ha sido actualizado con éxito!');
    }
    return view('admin');
  }


 
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
