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

    if ($this->image) {
      return 'splash/img/office/' . $this->image;
    }

    return 'splash/img/' . Options::UserDefault();
  }

  public function user()
  {
    return User::where('id_user', '=', $this->id)->where('id_privileges', '=', Privileges::Id('office'))->get()->first();
  }
}
