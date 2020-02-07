<?php

namespace App;

use DateTime;
use Carbon\Carbon;
use App\Option;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CountryScope;

class Patient extends Model
{
  const UPDATED_AT=NULL;
  const CREATED_AT=NULL;

  //Nombre de tabla
  protected $table = 'patients';
  //Llave primaria
  public $primaryKey = 'dni';

  protected $fillable = ['name', 'birthdate', 'sex', 'city', 'country'];

  //Incluye el scope de países (CountryScope.php) para filtrar a pacientes y consultorios de India
  protected static function boot()
  {
    parent::boot();

    static::addGlobalScope(new CountryScope);
  }

  //Relación N:1 con doctores
  public function doctor() {
    return $this->belongsTo('App\Doctor');
  }

  //Relación 1:N con citas
  public function appointments() {
    return $this->hasMany('App\Appointment');
  }

  public function getProfileimgAttribute()
  {



    $user = User::where('id_user',$this->dni)->where('id_privileges',Privileges::Id('patient'))->get()->first();

    $img='';
    if($user)
    {
      $img =$user->image;
    }

    if($img=='')
      return 'splash/img/'.Options::UserDefault();
    else
      return 'splash/img/'.$img;
  }

  public function getAgeAttribute()
  {

    return Carbon::parse($this->birthdate)->age;
  
  }
}
