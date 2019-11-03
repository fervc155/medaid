<?php

namespace App;

use App\Options;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
  



    public function gettodayAttribute()
    {
       $mytime = Carbon::now();
        $appointment = Appointment::all()->where('date', $mytime->toDateString())->sortBy('date');


        return $appointment;

    }


    public function getnewsAttribute()
    {
       $mytime = Carbon::now();
       $conditions = new Conditions;


        $appointment = Appointment::all()->where(
         'condition_id', '=', $conditions->id('pending'))->Where( 'condition_id', '=', $conditions->id('accepted'))->where(
         'date', '>=',$mytime->toDateString());;



        return $appointment;

    }
    public function getacceptedAttribute()
    {
       $mytime = Carbon::now();
       $conditions = new Conditions;


        $appointment = Appointment::all()->Where( 'condition_id', '=', $conditions->id('accepted'))->where(
         'date', '>=',$mytime->toDateString());;



        return $appointment;

    }
    public function getpendingAttribute()
    {
       $mytime = Carbon::now();
       $conditions = new Conditions;


        $appointment = Appointment::all()->where(
         'condition_id', '=', $conditions->id('pending'))->where(
         'date', '>=',$mytime->toDateString())->sortBy('date');



        return $appointment;

    }

}
