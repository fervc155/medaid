<?php

use App\Admin;
use App\Crud;
use App\User;
use Illuminate\Database\Eloquent\Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void


     */



    public function run()
    {



      $data = [
       'name'=>'nombre',
       'id_privileges'=>4,
       'email'=>'fervillanueva.1998@hotmail.com',
       'telephone'=>'3313131313',
       'birthdate'=> now(),
       'sex'=>'h',
       'password'=>'123456',


     ];


     $admin = new Admin;
     $admin->save();



     Crud::newAdmin($data,  $admin->id);


 

   $data = [
       'name'=>'josue',
       'id_privileges'=>4,
       'id_user'=>1,
       'email'=>'fercarrillo.1998@yahoo.com',
       'telephone'=>'3313131313',
       'birthdate'=> now(),

       'sex'=>'h',
       'password'=>'123456',
     ];


     $admin = new Admin;
     $admin->save();



     Crud::newAdmin($data,  $admin->id);









  }
}
