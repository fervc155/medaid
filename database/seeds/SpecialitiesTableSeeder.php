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
       'cost'=>'60'

     ]);
      Speciality::create([
        'name'=>'Medico Diagnostico',
        'cost'=>'40'

      ]);
      Speciality::create([
        'name'=>'Neomologia',
        'cost'=>'200'

      ]);
      Speciality::create([
        'name'=>'Hematologia',
        'cost'=>'200'

      ]);
      Speciality::create([
        'name'=>'Radiologia',
        'cost'=>'150'

      ]);
      Speciality::create([
        'name'=>'Gastroenterologia',
        'cost'=>'120'

      ]);

      Speciality::create([
        'name'=>'Nutrisionista',
        'cost'=>'200'

      ]);


      Speciality::create([
        'name'=>'Traumatologia',
        'cost'=>'150'

      ]);



    }
  }
