<?php

use App\User;
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
      User::create([
       'accepted'=>true,
       'id_privileges'=>4,
       'email'=>'fer@mail.com',
      'password'=>bcrypt('123456'),
     ]);


           User::create([
       'accepted'=>true,
       'id_privileges'=>1,
       'id_user'=>1,
       'email'=>'josue@mail.com',
      'password'=>bcrypt('123456'),
     ]);
  

           User::create([
       'accepted'=>true,
       'id_privileges'=>2,
       'id_user'=>1,
       'email'=>'kevin@mail.com',
      'password'=>bcrypt('123456'),
     ]);
  


    }
  }
