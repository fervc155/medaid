<?php

namespace App\Http\Livewire\Bi\Appointment;

use App\Speciality;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Quantity extends Component
{
		public $series;
	public $labels;
	protected $listeners = ['bi_month','bi_year','bi_all'];
	

	public function mount()
	{

		$this->bi_year();
	}

	public function bi_year()
	{

		$this->series =[];
		$this->labels =[];
		$specialities = Speciality::all();

		foreach ($specialities as $speciality) 
		{
			$c = DB::table('appointments')->where('speciality_id',$speciality->id)->whereYear('updated_at',now())->count();

			

				$this->labels[] = $speciality->name;
				$this->series[] = $c;
			
		}

		$this->emit('bi_reload_quantity',[$this->series,$this->labels]);
	}

	public function bi_month($month)
	{
		
		$this->series =[];
		$this->labels =[];
		$specialities = Speciality::all();

		foreach ($specialities as $speciality) 
		{

			$c =DB::table('appointments')->where('speciality_id',$speciality->id)->whereMonth('updated_at',$month)->count();

			

				$this->labels[] = $speciality->name;
				$this->series[] = $c;
			
			
		}

		$this->emit('bi_reload_quantity',[$this->series,$this->labels]);
	}
	public function bi_all()
	{
		
		$this->series =[];
		$this->labels =[];
		$specialities = Speciality::all();

		foreach ($specialities as $speciality) 
		{
			$c =DB::table('appointments')->where('speciality_id',$speciality->id)->count();
			

				$this->labels[] = $speciality->name;
				$this->series[] = $c;
			
			
		}

		$this->emit('bi_reload_quantity',[$this->series,$this->labels]);
	}
    public function render()
    {
        return view('livewire.bi.appointment.quantity');
    }
}
