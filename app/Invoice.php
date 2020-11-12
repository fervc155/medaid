<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
public $timestamps = false;
public $incrementing = false;


	public function payment()
	{
		return $this->belongsTo('App\Payment');
	}
}

