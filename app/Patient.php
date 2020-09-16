<?php

namespace App;

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

<<<<<<< HEAD
    //Incluye el scope de países (CountryScope.php) para filtrar a pacientes y consultorios de India
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CountryScope);
=======
 

  //Relación N:1 con doctores
  public function doctor()
  {
    return $this->belongsTo('App\Doctor');
  }

  //Relación 1:N con citas
  public function appointments()
  {
    return $this->hasMany('App\Appointment');
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
>>>>>>> 23bcdca... Actualizado a 7
    }

    //Relación N:1 con doctores
    public function doctor() {
        return $this->belongsTo('App\Doctor');
    }

    //Relación 1:N con citas
    public function appointments() {
        return $this->hasMany('App\Appointment');
    }

}
