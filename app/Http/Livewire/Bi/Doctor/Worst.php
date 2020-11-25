<?php

namespace App\Http\Livewire\Bi\Doctor;

use App\Appointment;
use App\Doctor;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Worst extends Component
{
		public $series;
		public $labels;
 	protected $listeners = ['bi_month','bi_year','bi_all'];
	

	public function mount()
	{
		$this->bi_year();
	}


	public function bi_all()
	{

		$this->labels =[];
		$this->series =[];
		$doctors = Doctor::all();

		$doctors = $doctors->unique('id');
		foreach ($doctors as $doctor) 
		{
			$c = DB::table('appointments')->where('doctor_id',$doctor->id)->get()->count();

			$n = $doctor->user()->name;
			$this->series[] = $c;
			$this->labels[] = $n;

		}


		$this->emit('bi_doctor',[$this->series,$this->labels]);
	}
	public function bi_year()
	{

		$this->labels =[];
		$this->series =[];
		$doctors = Doctor::all();

		$doctors = $doctors->unique('id');
		foreach ($doctors as $doctor) 
		{
			$c = DB::table('appointments')->where('doctor_id',$doctor->id)->whereYear('updated_at',now())->get()->count();

			$n = $doctor->user()->name;
			$this->series[] = $c;
			$this->labels[] = $n;

		}


		$this->emit('bi_doctor',[$this->series,$this->labels]);
	}

		public function bi_month($month)
	{

		$this->labels =[];
		$this->series =[];
		$doctors = Doctor::all();

		$doctors = $doctors->unique('id');
		foreach ($doctors as $doctor) 
		{
			$c = DB::table('appointments')->where('doctor_id',$doctor->id)->whereMonth('updated_at',$month)->get()->count();

			$n = $doctor->user()->name;
			$this->series[] = $c;
			$this->labels[] = $n;

		}


		$this->emit('bi_doctor',[$this->series,$this->labels]);
	}

    public function render()
    {
        return view('livewire.bi.doctor.worst');
    }
}
