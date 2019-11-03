<?php

namespace App;

use App\Condition;
use Illuminate\Database\Eloquent\Model;

class  Conditions extends Model
{
    
    public function Status($id)
    {

    	return Condition::all()->where('id',$id)->first()->status;
    }

    public function Id($status)
    {

    	return Condition::all()->where('status',$status)->first()->id;
    }
}
