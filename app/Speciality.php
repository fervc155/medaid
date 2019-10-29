<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
	    //Relación 1:N con doctores
    public function doctors() {
    	return $this->hasMany('App\Doctor');
    }

}
