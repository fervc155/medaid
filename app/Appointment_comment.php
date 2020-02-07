<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Appointment_comment extends Model
{
	public function appointment(){
		return $this->belongsTo('App\appointment');
	}


	public function user(){
		return $this->belongsTo('App\User');
	}


	public function getNameAttribute()
	{

		return User::find($this->user_id)->Name;
	}

	public function geteditedAttribute()
	{

		if($this->created_at != $this->updated_at)
		{
			return true;
		}

		return false;
	}

	public function getuserUrlAttribute()
	{
				return User::find($this->user_id)->Profileurl;



	}



}
