<?php

namespace App;

use DateTime;
use Carbon\Carbon;
use App\Option;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CountryScope;

class Patient extends Model
{
  const UPDATED_AT = NULL;
  const CREATED_AT = NULL;

  //Nombre de tabla
  protected $table = 'patients';
  //Llave primaria
  public $primaryKey = 'dni';

  protected $fillable = ['city', 'country'];

 
  public static function active()
 {
  return Patient::join('users', 'users.id_user', '=', 'patients.dni')
        ->select('patients.*')
        ->where('users.id_privileges',Privileges::Id('patient'))
        ->where('users.active','1')
        ->get();
 
 }

 
  //Relación 1:N con citas
  public function appointments()
  {
    return $this->hasMany('App\Appointment');
  }



    //Relación 1:N con consultorios
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

  public function getProfileUrlAttribute()
  {
    return url('/patient/' . $this->dni);
  }

  public function getidAttribute()
  {
    return $this->dni;
  }
  public function getProfileimgAttribute()
  {
 



    $img = '';
    if ($user) {
      $img = $this->user()->image;
    }

    if ($img == '')
      return 'splash/img/' . Options::UserDefault();
    else
      return 'splash/img/' . $img;
  }

  public function getAgeAttribute()
  {

    return Carbon::parse($this->birthdate)->age;
  }


  public function user()
  {
    return User::where('id_user', '=', $this->id)->where('id_privileges', '=', Privileges::Id('patient'))->get()->first();
  }


  ///////////////////////datos user





  public function getnameAttribute()
  {
    return $this->user()->name;
  }



  public function getemailAttribute()
  {
    return $this->user()->email;
  }
  public function gettelephoneAttribute()
  {
    return $this->user()->telephone;
  }
  public function getsexAttribute()
  {
    return $this->user()->sex;
  }


  public function getbirthdateAttribute()
  {
    return $this->user()->birthdate;
  }
}
