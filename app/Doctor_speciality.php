<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor_speciality extends Model
{
      public function speciality()
    {
        return $this->belongsTo('App\Speciality');
    }

      public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }


    public function getprofileUrlAttribute(){
      return $this->speciality->profileUrl;
    }


}
