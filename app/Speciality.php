<?php

namespace App;

use App\Options;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
	    //Relación 1:N con doctores
    public function doctors() {
    	return $this->hasMany('App\Doctor');
    }

      public function getpriceAttribute()
    {
        $options = new Options();
        return $options->Moneda(). $this->cost;
    }

     public function getstarsAttribute()
    {
       
        $contador=0;
        $sumatoria=0;
        foreach ($this->doctors as $doctor)
        {
        	if($doctor->stars>0)
        	{

                $contador++;
                $sumatoria+=$doctor->stars;
        	}
            
        }

        if($contador==0)
        {
        	return "No hay calificaciones";
        }

        

        return round($sumatoria/$contador, 1);
    }


   public function getStarsEarnedAttribute()
   {
        return round($this->stars);
   }

   public function getStarsMissingAttribute()
   {
        return 5- $this->StarsEarned;
   }

}
