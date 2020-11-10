<?php

namespace App\Http\Controllers;

use App\Admin;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
