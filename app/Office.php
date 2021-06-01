<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\CountryScope;

class Office extends Model
{
  const UPDATED_AT = NULL;
  const CREATED_AT = NULL;

  //Nombre de tabla
  protected $table = 'offices';
  //Llave primaria
  public $primaryKey = 'id';

 
 public static function active()
 {
  return Office::join('users', 'users.id_user', '=', 'offices.id')
        ->select('offices.*')
        ->where('users.id_privileges',Privileges::Id('office'))
        ->where('users.active','1')
        ->get();
 
 }
  //Relación N:N con médicos, incluyendo la tabla pivote
  public function doctors()
  {
    return $this->hasMany('App\Doctor');
  }
 
 
  public function getProfileUrlAttribute()
  {
    return url( '/office/' . $this->id);
  }

  //Accessor para que, al consultar el atributo 'nombre', la primera letra sea mayúscula


  public function getProfileimgAttribute()
  {
 
    return $this->user()->ProfileImg;
  }


  public function user()
  {
    return User::where('id_user', '=', $this->id)->where('id_privileges', '=', Privileges::Id('office'))->get()->first();
  }

  
}
