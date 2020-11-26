<?php

namespace App\Http\Livewire\Bi;

use App\Appointment;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Total extends Component
{
	public $total;

	protected $listeners = ['bi_month','bi_year','bi_all'];
	public function mount()
	{
		$this->bi_year();
	}


	public function bi_month($month)
	{

		$this->total  = DB::table('appointments')->whereIn('condition_id',[3,6])->whereMonth('updated_at',$month)->get()->sum('cost');


		$this->render();
	}

	public function bi_year()
	{

		
		$this->total  = DB::table('appointments')->whereIn('condition_id',[3,6])->whereYear('updated_at',now())->get()->sum('cost');


		$this->render();
	}

		public function bi_all()
	{

		
		$this->total  = DB::table('appointments')->whereIn('condition_id',[3,6])->get()->sum('cost');


		$this->render();
	}

    public function render()
    {
        return view('livewire.bi.total');
    }
}
