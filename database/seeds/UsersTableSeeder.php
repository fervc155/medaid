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
       'name'=>'Fernando Villanueva',
       'is_admin'=>true,
       'email'=>'fer@mail.com',
      'password'=>bcrypt('123456'),
     ]);


           User::create([
       'name'=>'Josue renaud',
       'is_admin'=>true,
       'email'=>'josue@mail.com',
      'password'=>bcrypt('123456'),
     ]);
  

           User::create([
       'name'=>'kevin antonio',
       'is_admin'=>true,
       'email'=>'kevin@mail.com',
      'password'=>bcrypt('123456'),
     ]);
  


    }
  }
