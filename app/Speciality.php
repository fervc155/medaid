<?php

namespace App;

use App\Doctor;
use App\Options;
use App\Soft\Levenshtein;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Speciality extends Model
{

    use SoftDeletes;

    public function doctor_speciality()
    {
        return $this->hasMany('App\Doctor_speciality');
    }

    public function getdoctorsAttribute(){

        return Doctor::join('doctor_specialities','doctors.id','doctor_specialities.doctor_id')
        ->select('doctors.*')
        ->where('doctor_specialities.speciality_id',$this->id)
        ->get();


    }
    public function getpriceAttribute()
    {
        return  strtoupper(config('cashier.currency')) . "$ ". $this->cost;
    }

    public function getcostAttribute(){

        $min=999999;
        foreach($this->doctor_speciality as $de){
            if($de->cost < $min)
                $min=$de->cost;
        }

        return $min ==  999999 ? 0 : $min;
    }

    public function getstarsAttribute()
    {

        $contador = 0;
        $sumatoria = 0;
        foreach ($this->doctor_speciality as $relation) {
            $doctor = $relation->doctor;
            if ($doctor->stars > 0) {

                $contador++;
                $sumatoria += $doctor->stars;
            }
        }

        if ($contador == 0) {
            return "No hay calificaciones";
        }



        return round($sumatoria / $contador, 1);
    }


    public function getStarsEarnedAttribute()
    {
        return round($this->stars);
    }

    public function getStarsMissingAttribute()
    {
        return 5 - $this->StarsEarned;
        
    }


    public static function search($s )
    {
       
        $specialities = Speciality::all();
        


        return Levenshtein::searchIn($specialities, $s);
    }
    

}
