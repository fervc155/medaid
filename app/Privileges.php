<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Privileges   //static class
{
   

   public static function Id($name)
   {
       return     User_privileges::where('user','=',strtolower($name))->get()->first()->id;


   }

   public static function User($id)
   {
       return     User_privileges::find($id)->name;


   }


}
