<?php

use App\Condition;
use Illuminate\Database\Seeder;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Condition::create([
       'status'=>'pending', 
     ]);
        Condition::create([
       'status'=>'accepted', 
     ]);


         Condition::create([
       'status'=>'completed', 
     ]);
         Condition::create([
       'status'=>'cancelled', 
     ]);
         Condition::create([
       'status'=>'rejected', 
     ]);
         Condition::create([
       'status'=>'late', 
     ]);
         Condition::create([
       'status'=>'lost', 
     ]);



         }
}
