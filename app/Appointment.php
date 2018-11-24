<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    const UPDATED_AT=NULL;
    const CREATED_AT=NULL;

    //Nombre de tabla
    protected $table = 'appointments';
    //Llave primaria
    public $primaryKey = 'id';

    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }

    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function office(){
        return $this->belongsTo('App\Office');
    }
}
