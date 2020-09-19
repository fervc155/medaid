<?php

use App\Doctor;
use Illuminate\Database\Seeder;
use  App\Crud;
class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Doctor::class, 20)->create();

        Doctor::All()->each(function ($doctor) 
        {
            $specialities = App\Speciality::all()->random(4);
            $doctor->specialities()->saveMany($specialities);


        
            
            Crud::newUserSeeder('doctor',$doctor->id);

        });
    }

}
