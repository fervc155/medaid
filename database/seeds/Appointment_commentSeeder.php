<?php

use Illuminate\Database\Seeder;

class Appointment_commentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
        factory(App\Appointment_comment::class, 200)->create();
    }

}
