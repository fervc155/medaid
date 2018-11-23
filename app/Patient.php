<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
	const UPDATED_AT=NULL;
    const CREATED_AT=NULL;

    //Nombre de tabla
    protected $table = 'patients';
    //Llave primaria
    public $primaryKey = 'dni';

    protected $fillable = ['name', 'birthdate', 'sex', 'city', 'country'];

    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }
}
