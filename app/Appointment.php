<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    //Nombre de tabla
    protected $table = 'appointments';
    //Llave primaria
    public $primaryKey = 'id';

    //Para Soft Deleting
    protected $dates = ['deleted_at'];

    //Relación N:1 con doctor
    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }

    //Relación N:1 con paciente
    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    //Relación N:1 con consultorio
    public function office(){
        return $this->belongsTo('App\Office');
    }
}
