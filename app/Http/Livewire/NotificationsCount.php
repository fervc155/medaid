<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationsCount extends Component
{


	public $count;
	protected $listeners = ['reloadCount','openNotifications'];


	public function mount()
	{
		$this->count =    Auth::user()->unreadNotifications()->count();
	}


	public function reloadCount()
	{
		$this->count = Auth::user()->unreadNotifications()->count();

	}


	public function openNotifications()
	{
	 	Auth::user()->unreadNotifications->markAsRead();


	}


	public function render()
	{
		return view('livewire.notifications-count');
	}
}
