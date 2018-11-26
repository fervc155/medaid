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

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CountryScope);
    }

    public function doctors()
    {
    	return $this->belongsToMany('App\Doctor')
                    ->withPivot('inTime', 'outTime');
    }

    public function appointments() {
        return $this->hasMany('App\Appointment');
    }
}
