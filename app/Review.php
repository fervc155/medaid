<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
        public function condition()
    {
        return $this->belongsTo('App\Appointment');
    }

}
