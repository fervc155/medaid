<?php

namespace App\Http\Livewire\Like;

use App\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Heart extends Component
{

	public $like;
	public $doctor_id;


	public function mount($doctor_id)
	{
		$this->doctor =$doctor_id;

		
		$like = Like::where('doctor_id',$doctor_id)
		->where('patient_dni',Auth::user()->profile()->id)
		->get()->first();


		if(null==$like)
			$this->like = 'fal';
		else
			$this->like = 'fas';
	}


	public function toggleLike()
	{
		if($this->like =='fal')
		{
			$like = new Like;

			$like->doctor_id = $this->doctor_id;
			$like->patient_dni = Auth::user()->profile()->id;


			$like->save();

			$this->like = 'fas';
		}

		else
		{
			$like = Like::where('doctor_id',$this->doctor_id)
			->where('patient_dni',)
			->get()->first();

			$query = 'DELETE FROM likes where doctor_id = '.$this->doctor_id. ' and patient_dni =' .Auth::user()->profile()->id;

			DB::delete($query);

			$this->like = 'fal';


		}
	}
	public function render()
	{
		return view('livewire.like.heart');
	}
}
