<?php

namespace App;

use App\Options;
use App\Soft\Levenshtein;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{

    public function doctors()
    {
        return $this->belongsToMany('App\Doctor');
    }

    public function getpriceAttribute()
    {
        return  strtoupper(config('cashier.currency')) . "$ ". $this->cost;
    }

    public function getstarsAttribute()
    {

        $contador = 0;
        $sumatoria = 0;
        foreach ($this->doctors as $doctor) {
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
