<?php

namespace App\Console\Commands;

use App\Appointment;
use App\Conditions;
use Illuminate\Console\Command;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:appointmentLost';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualiza el estado a lost cuando la fecha de la cita es menor a la actual';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $appointments = Appointment::where('condition_id',Conditions::Id('pending'))
         ->orWhere('condition_id',Conditions::Id('accepted'))->get();



         foreach ($appointments as $a ) 
         {
            if($a->date <= date('Y:m:d'))
            {

                if($a->time < date('H:s:i'))
                {
                    $a->condition_id = Conditions::Id('lost');
                    $a->save();
                }

            }
         }
    }
}
