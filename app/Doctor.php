<?php

namespace App;

use App\Doctor;
use App\Option;
use App\Options;
use App\Patient;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    const UPDATED_AT = NULL;
    const CREATED_AT = NULL;

    //Nombre de tabla
    protected $table = 'doctors';
    //Llave primaria
    public $primaryKey = 'id';


  public static function active()
 {
  return Doctor::join('users', 'users.id_user', '=', 'doctors.id')
        ->select('doctors.*')
        ->where('users.id_privileges',Privileges::Id('doctor'))
        ->where('users.active','1')
        ->get();
 
 }
 
    //Relación 1:N con consultorios
    public function office()
    {
        return $this->belongsTo('App\Office');
    }


    //Relación 1:N con consultorios
    public function likes()
    {
        return $this->hasMany('App\Like');
    }



    public function is($speciality_name)
    {
        foreach ($this->specialities as $speciality) 
        {

           if(strtolower($speciality->name) == $speciality_name)
            return true;
        }

        return false;
    }

    //Relación 1:N con citas
    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

    //Mutator para convertir la cédula a mayúsculas
    public function setCedulaAttribute($value)
    {
        $this->attributes['cedula'] = strtoupper($value);
    }

    public function specialities()
    {
        return $this->belongsToMany('App\Speciality');
    }



    public function user()
    {
        return User::where('id_user', '=', $this->id)->where('id_privileges', '=', Privileges::Id('doctor'))->get()->first();
    }

    public function hasSpeciality($id)
    {

        foreach ($this->specialities as $speciality) {
            if ($speciality->id  == $id) {
                return true;
            }
        }

        return false;
    }


    public function getProfileUrlAttribute()
    {
        return url('/doctor/' . $this->id);
    }

    public function getMinMaxCostAttribute()
    {
        $min = 999999;
        $max = 1;

        foreach ($this->specialities as $speciality) {
            if ($speciality->cost < $min) {
                $min = $speciality->cost;
            }

            if ($speciality->cost > $max) {
                $max = $speciality->cost;
            }
        }

        $moneda = strtoupper(config('cashier.currency')) . "$ ";
   
        if ($min == $max) {
            return $moneda . $min;
        }


        return $moneda . $min . " - " . $moneda . $max;
    }


    public function getstarsAttribute()
    {
        $appointments = Appointment::all()->where('doctor_id', $this->id);

        $contador = 0;
        $sumatoria = 0;
        foreach ($appointments as $ap) {
            if (isset($ap->stars)) {
                $contador++;
                $sumatoria += $ap->stars;
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



    public function myPatients()
    {
          
      $patients =  Patient::join('appointments', 'appointments.patient_dni', '=', 'patients.dni')
        ->join('users', 'users.id_user', 'patients.dni')
        ->select('patients.*', 'appointments.*')
          ->where('users.active', 1)
        ->where('appointments.doctor_id', $this->id)
        ->get();


 
      $patients = $patients->unique('dni');

      return $patients;

    }


    ///////////////////////datos user





    public function getnameAttribute()
    {
        return $this->user()->name;
    }



    public function getemailAttribute()
    {
        return $this->user()->email;
    }
    public function gettelephoneAttribute()
    {
        return $this->user()->telephone;
    }
    public function getsexAttribute()
    {
        return $this->user()->sex;
    }


    public function getbirthdateAttribute()
    {
        return $this->user()->birthdate;
    }
}
