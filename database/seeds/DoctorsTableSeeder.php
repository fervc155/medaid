<?php

use App\Doctor;
use Illuminate\Database\Seeder;

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

        $specialities = App\Speciality::all();
        Doctor::All()->each(function ($doctor) use ($specialities){
      	$doctor->specialities()->saveMany($specialities);
   		});
	
    }
}
