<?php

use App\Admin;
use App\Crud;
use App\User;
use Illuminate\Database\Eloquent\Faker;
use Illuminate\Database\Seeder;
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
       'email'=>'fer@mail.com',
       'telephone'=>'3313131313',
       'birthdate'=> now(),
       'sex'=>'h',
       'password'=>bcrypt('123456'),


     ];


     $admin = new Admin;
     $admin->save();



     Crud::newAdmin($data,  $admin->id);



     $data = [
      'name'=>'nombre',
      'id_privileges'=>3,
      'id_user'=>1,
      'email'=>'consultorio@mail.com',
      'telephone'=>'3313131313',
      'birthdate'=> now(),

      'sex'=>'h',
      'password'=>bcrypt('123456'),
    ];


    $admin = new Admin;
    $admin->save();



    Crud::newAdmin($data,  $admin->id);


  $data = [
      'name'=>'josue',
      'id_privileges'=>3,
      'id_user'=>1,
      'email'=>'josue@mail.com',
      'telephone'=>'3313131313',
      'birthdate'=> now(),

      'sex'=>'h',
      'password'=>bcrypt('123456'),
    ];


    $admin = new Admin;
    $admin->save();



    Crud::newAdmin($data,  $admin->id);









  }
}
