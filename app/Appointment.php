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
