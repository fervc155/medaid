<?php

use App\Speciality;
use Illuminate\Database\Seeder;

class SpecialitiesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      Speciality::create([
       'name'=>'Medico Cirujano',

     ]);
      Speciality::create([
        'name'=>'Medico Diagnostico',

      ]);
      Speciality::create([
        'name'=>'Neomologia',

      ]);
      Speciality::create([
        'name'=>'Hematologia',

      ]);
      Speciality::create([
        'name'=>'Radiologia',

      ]);
      Speciality::create([
        'name'=>'Gastroenterologia',

      ]);

      Speciality::create([
        'name'=>'Nutrisionista',

      ]);


      Speciality::create([
        'name'=>'Traumatologia',

      ]);



    }
  }
