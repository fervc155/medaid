<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function appointment()
    {
        return $this->belongsTo('App\Appointment');
    }

    public function invoice()
    {
    	return $this->hasOne('App\Invoice');
    }
}
