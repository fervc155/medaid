<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserPrivielegesTableSeeder::class);
        
        $this->call(OptionsTableSeeder::class);
        $this->call(SpecialitiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(OfficesTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);
        $this->call(PatientsTableSeeder::class);
        $this->call(ConditionsTableSeeder::class);
        $this->call(AppointmentsTableSeeder::class);

        $this->call(Appointment_commentSeeder::class);

    }
}
