<?php

namespace App;

use App\Options;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public $timestamps = false;


    //Relación N:1 con doctor
    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }

    //Relación N:1 con paciente
    public function patient(){
        return $this->belongsTo('App\Patient');
    }

       public function condition(){
        return $this->belongsTo('App\Condition');
    }

    public function getstatusAttribute()
    {
        return $this->condition->status;
    }






    public function getpriceAttribute()
    {
        $options = new Options();
        return $options->Moneda(). $this->cost;
    }
}
