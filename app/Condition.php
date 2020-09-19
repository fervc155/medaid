<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    public $timestamps = false;

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
}
