<?php

namespace App;

use App\Chat;
use App\Doctor;
use App\Office;
use App\Patient;
use App\Privileges;
use App\Soft\levenshtein;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
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

    public function verify()
    {
        if(null==$this->email_verified_at)
            return false;

        return true;
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


    public static function randomPassword($length)
    {
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $password = "";
        for($i=0;$i<$length;$i++)     
          $password .= substr($str,rand(0,62),1);

      return $password;

  }



    //Método para determinar si el usuario es de tipo administrador
    public function isAdmin()
    {
        if ( $this->id_privileges ==  Privileges::Id('admin'))
            return true;


        return false;
    }



    public function isOffice()
    {
        if ( $this->id_privileges ==  Privileges::Id('office'))
            return true;


        return false;
    }


    public function isDoctor()
    {
        if ( $this->id_privileges ==  Privileges::Id('doctor'))
            return true;


        return false;
    }

    public function isPatient()
    {
        if ( $this->id_privileges ==  Privileges::Id('patient'))
            return true;


        return false;
    }

    //Método para determinar si el usuario es de tipo administrador
    public function admin()
    {
        if ( $this->id_privileges >=  Privileges::Id('admin'))
            return true;


        return false;
    }



    public function office()
    {
        if ( $this->id_privileges >=  Privileges::Id('office'))
            return true;


        return false;
    }


    public function doctor()
    {
        if ( $this->id_privileges >=  Privileges::Id('doctor'))
            return true;


        return false;
    }

    public function patient()
    {
        if ( $this->id_privileges >=  Privileges::Id('patient'))
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






    public function activate()
    {
        $this->active=1;
        $this->save();
    }
  public function deactivate()
    {
        $this->active=0;
        $this->save();
    }




    ///////////////////static
    public static function active()
    {
      return User::where('active','1')->get();

  }
  public static function empty()
  {


       return Collection::make(new User);

    }

    public static function search($s,$privilege=0)
    {

        if($privilege<1)
            $users = User::active();
        else
        {
            $users = User::where('id_privileges',$privilege)
            ->where('active',1)->get();
        }

        return Levenshtein::searchIn($users, $s);
    }




}
