<?php

namespace App;

use App\Doctor;
use App\Office;
use App\Patient;
use App\Privileges;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    //Atributos modificables
    protected $fillable = [
        'name', 'is_admin', 'email', 'password',
    ];

    //Atributos ocultos
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function comments()
    {
       return $this->hasMany('App\Appointment_comment')->orderBy('created_at','DESC');

    }





    


    //Método para determinar si el usuario es de tipo administrador
    public function isAdmin()
    {
        if( $this->id_privileges ==  Privileges::Id('admin'))
            return true;
        

        return false;
    }



    public function isOffice()
    {
        if( $this->id_privileges ==  Privileges::Id('office'))
            return true;
        

        return false;
    }


    public function isDoctor()
    {
        if( $this->id_privileges ==  Privileges::Id('doctor'))
            return true;
        

        return false;
    }

    public function isPatient()
    {
        if( $this->id_privileges ==  Privileges::Id('patient'))
            return true;
        

        return false;
    }


    public function getProfileimgAttribute()
    {

        $img = $this->image;

        if($img=='')
            return 'splash/img/'.Options::UserDefault();
        else
            return 'splash/img/'.$img;
    
    }

    public function getNameAttribute()
    {

        if($this->isPatient())
        {

            return Patient::find($this->id_user)->name;


        }
        else if($this->isDoctor())
        {

            return Doctor::find($this->id_user)->name;

        }
        else if($this->isOffice())
        {

            return Office::find($this->id_user)->name;

        }
        else
        {
            return 'Admin';
        }

    }


    public function getProfileUrlAttribute()
    {
        if($this->isPatient())
        {

            return '/patient/'.$this->id_user;


        }
        else if($this->isDoctor())
        {


            return '/doctor/'.$this->id_user;
        }
        else if($this->isOffice())
        {


            return '/office/'.$this->id_user;
        }
        else
        {
            return '/home';
        }


    }





    

}