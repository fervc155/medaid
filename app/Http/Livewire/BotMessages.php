<?php

namespace App\Http\Livewire;

use App\Soft\Chatbot;
use Livewire\Component;

class BotMessages extends Component
{

	public $messages;
 
 
	public function mount()
	{

	



 		$this->messages= [];

		$this->messages[]= ["Hola, mi nombre es MedBot soy un asistente virtual entrenado para contestar tus dudas",'left'];


	}


	protected $listeners = [ 'sendMessage'];

	 

 
 
	public function sendMessage($message)
	{	
		$chatbot =new Chatbot;

		if(isset($message))
		{

		$this->messages[]=array($message,'right');

		$chatbot->listen($message);



		$this->messages[]= [$chatbot->response(),'left'];
		$this->emit('scrollMessage');
		}


	}

	public function render()
	{
	        return view('livewire.bot-messages');
    }
}
