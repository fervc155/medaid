<?php

namespace App;

use App\Options;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\Collection;

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
    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    //Relación N:1 con paciente
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function condition()
    {
        return $this->belongsTo('App\Condition');
    }

    public function review()
    {
        return $this->hasOne('App\Review');
    }

        public function payment()
    {
        return $this->hasOne('App\Payment');
    }


    public function comments()
    {
        return $this->hasMany('App\Appointment_comment')->orderBy('created_at', 'DESC');
    }

    public function speciality()
    {
        return $this->belongsTo('App\Speciality');
    }



    public function prescriptions()
    {
        return $this->hasMany('App\Prescription')->orderBy('created_at', 'DESC');
    }

    public function getstatusAttribute()
    {
        return $this->condition->status;
    }







    public function getProfileUrlAttribute()
    {
        return url('/appointment/' . $this->id);
    }
    
    public function getpriceAttribute()
    {
        return  strtoupper(config('cashier.currency')) . "$ ". $this->cost;
    }


    public function getstarsAttribute()
    {
        if(null!=$this->review)
            return $this->review->stars;

            return null;
    }


    public function getCanUpdateLateAttribute()
    {





        if ($this->IsToday) {

            $timeless = date('H:s:i', strtotime(date('H:s:i') . '-1 hours'));


            if ($this->time > $timeless) {


                return true;
            }
        }

        return false;
    }


    public function getIsTodayAttribute()
    {

        if ($this->date == date('Y-m-d')) {



            return true;
        }



        return false;
    }



    public function getUsers($comments=false)
    {
            $users = User::where('id','a')->get();

            $users->push($this->doctor->user());
            $users->push($this->patient->user());


            if($comments)
            {

                $usersComments = User::join('appointment_comments','appointments.id','appointment_comments.appointment_id')
                ->select('users.*')
                ->unique('users.id');


               $users = $users->merge($usersComments);

               $users = $users->unique();
            }


            return $users;

    }
}


/*=============================================
SET GLOBAL event_scheduler = ON;
CREATE EVENT `update_appointment_pending_lost` ON SCHEDULE EVERY 1 MINUTE STARTS '2019-12-29 00:00:00.000000' ENDS '2029-12-29 00:00:00.000000' ON COMPLETION PRESERVE ENABLE DO

update appointments set condition_id=7  where date <= DATE_FORMAT(NOW(),"%Y-%m-%d") and hora < CURRENT_TIME() and condition_id=1;


CREATE EVENT `update_appointment_accepted_lost` ON SCHEDULE EVERY 1 MINUTE STARTS '2019-12-29 00:00:00.000000' ENDS '2029-12-29 00:00:00.000000' ON COMPLETION PRESERVE ENABLE DO

update appointments set condition_id=7  where date <= DATE_FORMAT(NOW(),"%Y-%m-%d") and hora < CURRENT_TIME() and condition_id=2;




 ======*/
