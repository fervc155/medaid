<?php

use Illuminate\Database\Seeder;

class OptionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          Option::create([
    	'name'=>'user-default',
    	'value'=>'user-default.jpg',

   		]);
           Option::create([
    	'name'=>'moneda',
    	'value'=>'MXN $',

   		]);

            Option::create([
    	'name'=>'idioma',
    	'value'=>'esp',

   		]);
   
    }
}
