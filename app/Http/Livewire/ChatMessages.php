<?php

namespace App\Http\Livewire;

use App\Chat;
use App\Messages;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatMessages extends Component
{

	public $messages;
	public $userOut;

	public function mount()
	{

		$lastChat =Chat::where('user_in',Auth::user()->id)
		->orwhere('user_out',Auth::user()->id)
		->get()->first();


		if($lastChat->user_in == Auth::user()->id)
		{

			$this->selectChat($lastChat->user_out);
			$this->userOut=User::find($lastChat->user_out);

		}
		else
		{
			$this->selectChat($lastChat->user_in);
			$this->userOut=User::find($lastChat->user_in);

		}
	}


	protected $listeners = ['selectChat','reloadMessages','sendMessage'];

	public function selectChat($idUser)
	{
		$this->userOut=User::find($idUser);

		$this->messages =Messages::getMessages($this->userOut->id);




	}


	public function loadMore()
	{
		$count  = count($this->messages);
		$this->messages =Messages::getMessages($this->userOut->id,$count+10);

	}



	public function reloadMessages()
	{


		$this->selectChat($this->userOut->id);

		$this->emit('scrollMessage');
	}

	public function sendMessage($id)
	{

		$message = Chat::find($id);

		$this->messages->push($message);

		$this->emit('scrollMessage');


	}

	public function render()
	{
		return view('livewire.chat-messages');
	}
}
