<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment_comment extends Model
{
	public function appointment(){
		return $this->belongsTo('App\appointment');
	}




}
