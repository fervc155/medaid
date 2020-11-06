<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BotForm extends Component
{
 
 
 
 

 	public function send($message)
 	{

 	  
 			 $this->emit('sendMessage',$message);



 	}


    public function render()
    {    return view('livewire.bot-form');
    }
}
