<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    const UPDATED_AT=NULL;
    const CREATED_AT=NULL;

    //Nombre de tabla
    protected $table = 'offices';
    //Llave primaria
    public $primaryKey = 'id';

    public function doctors()
    {
    	return $this->belongsToMany('App\Doctor')
                    ->withPivot('inTime', 'outTime');
    }

    public function appointments() {
        return $this->hasMany('App\Appointment');
    }
}
