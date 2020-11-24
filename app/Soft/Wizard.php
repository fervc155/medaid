<?php 


namespace App\Soft;
use App\Appointment;
use App\Doctor;
use App\Soft\Tree;
use App\Soft\Tree\Data;
use App\Soft\Tree\Evaluate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
class Wizard {



	public $table;
	public $tree;
	public $words;


	public function __construct()
	{

		$this->table = $this->makeTable();
		$this->words = ['postalCode','age','sex','speciality','doctor'];

		$this->tree = new Tree($this->table,$this->words);

	}


	public function listen($data)
	{


		$this->question = $data;



	}


	public function print_tree()
	{

		return $this->tree->print_tree();
	}

	public function response()
	{


		if(null==$this->question)
			return "No he recibido una pregunta";




		$arrays = $this->tree->predict($this->question);


//		return $arrays;
		$doctors = Collection::make(new Doctor);


		foreach ($arrays as $key => $value) 
		{

			$doctor =Doctor::find($key);


			if($doctor->is($this->question[3]))
				$doctors->push($doctor);


		}

	//	$tag=  key($this->tree->predict($this->question));


		return $doctors;

	}




	public function makeTable()
	{


		$appointments =Appointment::all();


		$table=[];
		foreach ($appointments as $appointment) 
		{
			$row= [];
			$row[]= $appointment->patient->postalCode;
			$row[]= $appointment->patient->age;
			$row[]= strtolower($appointment->patient->sex);
			$row[]= strtolower($appointment->speciality->name);

			$apHour =Carbon::parse($appointment->time);
			$pmHour = Carbon::parse('12:00:00');

			//$row[]= ($apHour->gt($pmHour))? 'am': 'pm';

			$row[]= $appointment->doctor_id;


			if(!in_array($row,$table))
				$table[]=$row;

		}


		return $table;


	}



}
