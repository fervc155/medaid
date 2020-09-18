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
	public $countMessages;
	public $userOut;

	public function mount()
	{

		$lastChat = Messages::lastest();
if(null == $lastChat)
			return;

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

		$this->messages =Messages::get($this->userOut->id);
		$this->countMessages =Messages::count($this->userOut->id);


		$this->emit('scrollMessage');


	}


	public function loadMore()
	{
		$count  = count($this->messages);
		$this->messages =Messages::get($this->userOut->id,$count+10);

	}



	public function reloadMessages()
	{


		$this->selectChat($this->userOut->id);

 	}

	public function sendMessage($id)
	{

		$this->countMessages+=1;
		$message = Chat::find($id);

		$this->messages->push($message);

		$this->emit('scrollMessage');


	}

	public function render()
	{
		return view('livewire.chat-messages');
	}
}
