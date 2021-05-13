<?php

use App\Doctor;
use App\Speciality;
use App\Doctor_speciality;
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
        factory(App\Doctor::class, 10)->create();

        Doctor::All()->each(function ($doctor) 
        {
            $specialities = Speciality::all()->random(4);

            foreach($specialities as $key=>$spe){

                $d_esp = new Doctor_speciality;
                $d_esp->doctor_id = $doctor->id;
                $d_esp->cost ='30';
                $d_esp->speciality_id=$spe->id;
                $d_esp->save();
            }
           

        
            
            Crud::newUserSeeder('doctor',$doctor->id);

        });
    }

}
