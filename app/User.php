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
          'name','email', 'password','telephone','sex','birthdate',
        'image' ,'id_privileges','id_user', 
    ];


            
     //Atributos ocultos
    protected $hidden = [
        'password', 'remember_token'
    ];



    
    public function comments()
    {
       return $this->hasMany('App\Appointment_comment')->orderBy('created_at','DESC');

    }

    public function getNamePrivilegeAttribute()
    {

         if($this->isAdmin())
        {
            return 'Admin';
        }


        return str_replace("App\\","",get_class($this->profile()));
    }
 
    public function profile()
    {
        
        if($this->isAdmin())
        {
            return 'Admin';
        }
        else if($this->isOffice())
        {
            return Office::find($this->id_user);

        }
           else if($this->isDoctor())
        {
             return Doctor::find($this->id_user);
           
        }
           else if($this->isPatient())
        {
              return Patient::find($this->id_user);
          
        }
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

            return url('/storage/'.$img);
    
    }

 
    public function getPathimgAttribute()
    {

        $img = $this->image;

        if($img=='')
            return 'splash/img/'.Options::UserDefault();
        else

            return public_path().'/storage/'.$img;
    
    }


    public function getProfileUrlAttribute()
    {
        

        if($this->isAdmin())
        {

            return url('/home');
        }




 
         return $this->profile()->ProfileUrl;


    }





    

}