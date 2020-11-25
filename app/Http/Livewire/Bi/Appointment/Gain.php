<?php

namespace App\Http\Livewire\Bi\Appointment;

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
 			$this->series=[];

		for($i=1; $i<=12 ;$i++) 
		{
			$this->series[]=
			DB::table('appointments')->whereMonth('updated_at',$i)->whereYear('updated_at',now())->sum('cost');
		}

 		$this->emit('bi_gain',$this->series);
 	}


    public function render()
    {
        return view('livewire.bi.appointment.gain');
    }
}
