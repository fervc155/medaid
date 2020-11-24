<?php

namespace App\Http\Livewire\Wizard;

use App\Speciality;
use Livewire\Component;

class Ask extends Component
{
	public $specialities;


	public function mount()
	{
		$this->specialities = Speciality::all();
	}

    public function render()
    {
        return view('livewire.wizard.ask');
    }
}
