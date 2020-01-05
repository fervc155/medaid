<?php

namespace App;

use App\Option;
use App\Options;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    const UPDATED_AT=NULL;
    const CREATED_AT=NULL;

    //Nombre de tabla
    protected $table = 'doctors';
    //Llave primaria
    public $primaryKey = 'id';

    //Relación 1:N con pacientes
    public function patients() {
    	return $this->hasMany('App\Patient');
    }

    //Relación 1:N con consultorios
    public function office() {
    	return $this->belongsTo('App\Office');
    }

    //Relación 1:N con citas
    public function appointments() {
        return $this->hasMany('App\Appointment');
    }

    //Mutator para convertir la cédula a mayúsculas
    public function setCedulaAttribute($value)
    {
        $this->attributes['cedula'] = strtoupper($value);
    }

    public function speciality() {
        return $this->belongsTo('App\Speciality');
    }


    public function getstarsAttribute()
    {
        $appointments= Appointment::all()->where('doctor_id',$this->id);

        $contador=0;
        $sumatoria=0;
        foreach ($appointments as $ap)
        {
            if(isset($ap->stars))
            {
                $contador++;
                $sumatoria+=$ap->stars;
            }
        }

     if($contador==0)
        {
            return "No hay calificaciones";
        }

           

        return round($sumatoria/$contador, 1);
    }
   

    public function getProfileimgAttribute()
    {

        //if not have Img profile
        


       return 'splash/img/'.Options::UserDefault();
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
