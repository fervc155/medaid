<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\DB;

class TruncateTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'truncate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all info of tables';

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
     * @return int
     */
    public function handle()
    {
        $query =DB::select('show tables');

       
        foreach($query as $key=>$line){
            foreach($line as $key=>$table){
                DB::table($table)->truncate();

            }
        } 

    }
}
