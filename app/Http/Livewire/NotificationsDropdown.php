<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationsDropdown extends Component
{

	public $notifications;

	protected $listeners = ['reloadCount','openNotifications'];


	public function mount()
	{
		$this->notifications= array();
		$this->reloadCount();
	}
	public function reloadCount()
	{


    $notifications =    Auth::user()->notifications->sortByDesc('created_at')->take(6);
 
    $this->notifications = array();


    foreach ($notifications as $notification) 
    {
       $data= array(
        'subject'=>$notification->data['subject']??'',
        'text'=>$notification->data['text']??'',
        'url'=>$notification->data['url']??'',
        'read'=>$notification->read_at??false,
        'date'=>$notification->created_at->diffForHumans(),
       );

 
       array_push( $this->notifications,$data);
    }

     
 }

 	public function openNotifications()
 	{
		Auth::user()->unreadNotifications->markAsRead();

 	}


    public function render()
    {
        return view('livewire.notifications-dropdown');
    }
}
