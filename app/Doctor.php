<?php

namespace App;

use App\Option;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    const UPDATED_AT=NULL;
    const CREATED_AT=NULL;

    //Nombre de tabla
    protected $table = 'doctors';
    //Llave primaria
    public $primaryKey = 'id';

    //Relación 1:N con pacientes
    public function patients() {
    	return $this->hasMany('App\Patient');
    }

    //Relación N:N con consultorios
    public function offices() {
    	return $this->belongsToMany('App\Office')
                    ->withPivot('inTime', 'outTime');
    }

    //Relación 1:N con citas
    public function appointments() {
        return $this->hasMany('App\Appointment');
    }

    //Mutator para convertir la cédula a mayúsculas
    public function setCedulaAttribute($value)
    {
        $this->attributes['cedula'] = strtoupper($value);
    }

    public function speciality() {
        return $this->belongsTo('App\Speciality');
    }


   

    public function getProfileimgAttribute()
    {

        //if not have Img profile
         $option =Option::all()->where('name','user-default')->first();


       return 'splash/img/'.$option->value;
    }
}
