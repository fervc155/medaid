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
    	return $this->hasMany('App\Doctor');
    }

    //Accessor para que, al consultar el atributo 'nombre', la primera letra sea mayúscula

    
    public function getProfileimgAttribute()
    {

        if($this->image)
        {
            return 'splash/img/office/'. $this->image;
        }

         $option =Option::all()->where('name','user-default')->first();

       return 'splash/img/'.$option->value;
    }
 
 }
