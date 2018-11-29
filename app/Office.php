<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\CountryScope;

class Office extends Model
{
    const UPDATED_AT=NULL;
    const CREATED_AT=NULL;

    //Nombre de tabla
    protected $table = 'offices';
    //Llave primaria
    public $primaryKey = 'id';

    //Función para añadir Scope, que nos permite filtrar resultados
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CountryScope);
    }

    //Relación N:N con médicos, incluyendo la tabla pivote
    public function doctors()
    {
    	return $this->belongsToMany('App\Doctor')
                    ->withPivot('inTime', 'outTime');
    }

    //Relación 1:N con citas
    public function appointments() {
        return $this->hasMany('App\Appointment');
    }

    //Accessor para que, al consultar el atributo 'nombre', la primera letra sea mayúscula
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
