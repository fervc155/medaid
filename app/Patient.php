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

    //Incluye el scope de países (CountryScope.php) para filtrar a pacientes y consultorios de India
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CountryScope);
    }

    public function doctor() {
        return $this->belongsTo('App\Doctor');
    }

    public function appointments() {
        return $this->hasMany('App\Appointment');
    }

    //Como para qué uso esto?
    /*public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }*/
}
