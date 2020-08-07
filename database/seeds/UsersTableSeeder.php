<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void


     */


     
     public function run()
    {
      User::create([
        'name'=>'nombre',
       'id_privileges'=>4,
       'email'=>'fer@mail.com',
       'telephone'=>'3313131313',
       'sex'=>'h',
       'password'=>bcrypt('123456'),
     ]);


  
 
   


 



    }
  }
