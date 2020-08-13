<?php

use App\Crud;
use App\Patient;
use Illuminate\Database\Seeder;
 
class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Patient::class, 20)->create();

    	Patient::All()->each(function ($patient) 
    	{

 
             Crud::newUserSeeder('patient',$patient->id);

    	});

    }
}
