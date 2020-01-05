<?php

use App\User_privileges;
use Illuminate\Database\Seeder;

class UserPrivielegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
  User_privileges::create([
     'user'=>'patient'

     ]);


  User_privileges::create([
     'user'=>'doctor'

     ]);

  User_privileges::create([
     'user'=>'office'

     ]);

  User_privileges::create([
     'user'=>'admin'

     ]);


    }
}
