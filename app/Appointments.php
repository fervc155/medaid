<?php

namespace App;

use App\Options;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Appointments
{




    public static function Today($model = "", $id = "")
    {
        $mytime = Carbon::now();
        $appointment = Appointment::all()
            ->where('date', $mytime->toDateString())
            ->where($model, '=', $id)
            ->sortBy('date');


        return $appointment;
    }


    public static function getnewsAttribute()
    {
        $mytime = Carbon::now();
        $conditions = new Conditions;


        $appointment = Appointment::all()->where(
            'condition_id',
            '=',
            $conditions->id('pending')
        )->Where('condition_id', '=', $conditions->id('accepted'))->where(
            'date',
            '>=',
            $mytime->toDateString()
        );;



        return $appointment;
    }
    public static function getacceptedAttribute()
    {
        $mytime = Carbon::now();
        $conditions = new Conditions;


        $appointment = Appointment::all()->Where('condition_id', '=', $conditions->id('accepted'))->where(
            'date',
            '>=',
            $mytime->toDateString()
        );



        return $appointment;
    }
    public static function Pending()
    {
        $mytime = Carbon::now();
        $conditions = new Conditions;


        $appointment = Appointment::all()->where(
            'condition_id',
            '=',
            $conditions->id('pending')
        )->where(
            'date',
            '>=',
            $mytime->toDateString()
        )->sortBy('date');



        return $appointment;
    }
}
