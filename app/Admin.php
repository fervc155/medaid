<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
   
	  public function getProfileUrlAttribute()
	  {
	    return url( '/admin/' . $this->id);
	  }

	  //Accessor para que, al consultar el atributo 'nombre', la primera letra sea mayúscula



	  public function user()
	  {
	    return User::where('id_user', '=', $this->id)->where('id_privileges', '=', Privileges::Id('admin'))->get()->first();
	  }


	    public static function active()
	 {
	  return Patient::join('users', 'users.id_user', '=', 'admins.id')
	        ->select('admins.*')
	        ->where('users.id_privileges',Privileges::Id('admin'))
	        ->where('users.active','1')
	        ->get();
	 
	 }
}
