<?php

namespace App;

use App\Condition;
use Illuminate\Database\Eloquent\Model;

class  Conditions extends Model
{
    
    public static function Status($id)
    {

    	return Condition::all()->where('id',$id)->first()->status;
    }

    public static function Id($status)
    {

    	return Condition::all()->where('status',$status)->first()->id;
    }
}
