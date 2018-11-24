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

    //Accessor
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    //Mutator
    public function setFirstNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }
}
