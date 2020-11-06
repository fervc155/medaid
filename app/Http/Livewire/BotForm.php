<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BotForm extends Component
{
 
	public $message;


 

	public function mount()
	{
		$this->message ='';

		 
	}

 

 	public function sendMessage()
 	{

 	  
 		 


 			 $this->emit('sendMessage', $this->message);


 

 			 $this->message="";




 	}

    public function render()
    {    return view('livewire.bot-form');
    }
}
