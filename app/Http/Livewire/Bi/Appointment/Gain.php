<?php

namespace App\Http\Livewire\Bi\Appointment;

use App\Soft\Regression;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Gain extends Component
{

	public $series;
 	public function mount()
	{
	
		$this->loadChart();
 	}

 	protected $listeners = ['loadChart'];

 	public function loadChart()
 	{
 	 
	   	$x= [1,2,3,4,5,6,7,8,9,10,11,12];
    	$this->series=[];

    	$today = Carbon::now();
    	$lastYear = $today->subYear(1);


 	   	for($i=1; $i<=12 ;$i++) 
		{
			$this->series[]=
			DB::table('appointments')->whereIn('condition_id',[3,6])->whereMonth('updated_at',$lastYear->month)
			->whereYear('updated_at',$lastYear->year)->sum('cost');

			$lastYear = $lastYear->addMonth(1);
			
		}

	 

		$r = new Regression;

		$r->entrenar($x,$this->series);
		$nextMonth= $r->predecir_y(13);

		$y=[];
		for($i=1;$i<=12;$i++)
		{
			$y[] = $r->predecir_y($i);
		}
		 

 		$this->emit('bi_gain',$this->series);
 		$this->emit('bi_regression',[$x,$y,$nextMonth]);
	 
 	}


    public function render()
    {
        return view('livewire.bi.appointment.gain');
    }
}
