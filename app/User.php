<?php

namespace App;

use App\Chat;
use App\Doctor;
use App\Office;
use App\Patient;
use App\Privileges;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class User extends Authenticatable
{
    use Notifiable;

    //Atributos modificables
    protected $fillable = [
        'name', 'email', 'password', 'telephone', 'sex', 'birthdate',
        'image', 'id_privileges', 'id_user',
    ];



    //Atributos ocultos
    protected $hidden = [
        'password', 'remember_token'
    ];




    public function comments()
    {
        return $this->hasMany('App\Appointment_comment')->orderBy('created_at', 'DESC');
    }

    public function getNamePrivilegeAttribute()
    {

        if ($this->isAdmin()) {
            return 'Admin';
        }


        return str_replace("App\\", "", get_class($this->profile()));
    }

    public function profile()
    {

        if ($this->isAdmin()) {
            return Admin::find($this->id_user);
        } else if ($this->isOffice()) {
            return Office::find($this->id_user);
        } else if ($this->isDoctor()) {
            return Doctor::find($this->id_user);
        } else if ($this->isPatient()) {
            return Patient::find($this->id_user);
        }
    }






    //Método para determinar si el usuario es de tipo administrador
    public function isAdmin()
    {
        if ($this->id_privileges ==  Privileges::Id('admin'))
            return true;


        return false;
    }



    public function isOffice()
    {
        if ($this->id_privileges ==  Privileges::Id('office'))
            return true;


        return false;
    }


    public function isDoctor()
    {
        if ($this->id_privileges ==  Privileges::Id('doctor'))
            return true;


        return false;
    }

    public function isPatient()
    {
        if ($this->id_privileges ==  Privileges::Id('patient'))
            return true;


        return false;
    }


    public function getProfileimgAttribute()
    {

        $img = $this->image;

        if ($img == '')
            return url('splash/img/' . Options::UserDefault());
        else

            return url('/storage/' . $img);
    }


    public function getlastChatAttribute()
    {
        $message = Chat::whereIn('user_in',[Auth::user()->id,$this->id])
        ->whereIn('user_out',[Auth::user()->id,$this->id])
        ->get()
        ->last();


        if(null ==$message)
        {
            $message = new Chat;

            $message->message="Comenzar chat";


            return $message;
        }


        return $message;


    }
    public function getPathimgAttribute()
    {

        $img = $this->image;

        if ($img == null)
            return url('splash/img/' . Options::UserDefault());
        else

            return public_path() . '/storage/' . $img;
    }


    public function getProfileUrlAttribute()
    {




        return $this->profile()->ProfileUrl;
    }









    ///////////////////static

    public static function empty()
    {


     return Collection::make(new User);

 }

 public static function search($s)
 {
    $s = strtolower($s);
    $users = User::all();

    if(strlen($s)<1)
    {
        return $users;
    }

    $col = Collection::make(new User);

    $match =false;

    foreach ($users as $user ) 
    {

        $stringName = strtolower($user->name);

        $explode = explode(' ',$s);
        $countExplode=0;

        foreach (explode(' ',$stringName) as $string) 
        {


            foreach ($explode as $subSearch) 
            {
                if(levenshtein($string,$subSearch)<= strlen($string)/2)
                {  

                    $countExplode++;
                    break;


                }
            }
        }

        if($countExplode> count($explode)/2)
        {

            $match=true;
        }


        if(levenshtein($stringName, $s)< strlen($string)/2)
        {  
            $match=true;

        }


        if(strpos($stringName,$s)!==false)
        {  
            $match=true;

        }


        if($match)
        {
         $col->push($user);
         $match=false;

     }
 }


 return $col;
}
}
