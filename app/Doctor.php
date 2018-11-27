<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    const UPDATED_AT=NULL;
    const CREATED_AT=NULL;

    //Nombre de tabla
    protected $table = 'doctors';
    //Llave primaria
    public $primaryKey = 'id';

    public function patients() {
    	return $this->hasMany('App\Patient');
    }

    public function offices() {
    	return $this->belongsToMany('App\Office');
    }

    public function appointments() {
        return $this->hasMany('App\Appointment');
    }

    //Mutator para convertir la cédula a mayúsculas
    public function setCedulaAttribute($value)
    {
        $this->attributes['cedula'] = strtoupper($value);
    }
}
