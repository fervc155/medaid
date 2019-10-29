<?php

use App\Option;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
