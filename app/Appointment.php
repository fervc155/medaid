<?php

namespace App;

use App\Options;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public $timestamps = false;


    // public static function boot()
    // {
    //     parent::boot();
    //     static::created(function($service_requestt)
    //     {
    //         Event::fire('servuce_request.created',$service_request);
    //     });
    // }


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


        public function comments() {
        return $this->hasMany('App\Appointment_comment')->orderBy('created_at','DESC');
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


    public function getCanUpdateLateAttribute()
    {



      

        if($this->IsToday)
        {

        $timeless = date('H:s:i',strtotime(date('H:s:i').'-1 hours'));
   

            if ($this->time> $timeless)
            {

                
                return true;
            }

           
        }

        return false;
    }


    public function getIsTodayAttribute()
    {

        if($this->date == date('Y-m-d'))
        {



            return true;
        }



        return false;
    }
}


/*=============================================
SET GLOBAL event_scheduler = OFF;
CREATE EVENT  update_appointment_condition_id
ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 MINUTE
DO
update horas set status=3  where date = DATE_FORMAT(NOW(),"%Y-%m-%d") and hora < CURRENT_TIME();




22:00 22:01

 ======*/
