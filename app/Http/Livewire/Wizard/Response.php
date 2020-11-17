<?php

namespace App\Http\Livewire\Wizard;

use App\Soft\Wizard;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Response extends Component
{

	public $doctors;
	public $text;

	protected $listeners = ['wizard_getResponse'];


	public function mount()
	{
		$this->text='Espera un momento';
		$this->doctors = array();
	} 


	public function wizard_getResponse($speciality)
	{


        $wizard  = new Wizard();

        $wizard->listen([Auth::user()->profile()->postalCode,
        				Auth::user()->profile()->age,
        				strtolower(Auth::user()->sex),
        				strtolower($speciality),
        				'?']);



        $this->doctors =$wizard->response();


        if($this->doctors->count()<1)
        	$this->text='No se encontraron coincidencias';
        else
        	$this->text='';


        $this->render();

	}
    public function render()
    {
        return view('livewire.wizard.response');
    }
}
