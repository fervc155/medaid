<?php

use App\Crud;
use App\Office;
use Illuminate\Database\Seeder;

class OfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Office::class, 4)->create();


        Office::All()->each(function ($office) 
       {
            
            Crud::newUserSeeder('office',$office->id);

        });
    }
}
