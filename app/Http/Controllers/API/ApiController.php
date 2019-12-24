<?php

namespace App\Http\Controllers\API;


use App\Appointment;
use App\Doctor;
use App\Http\Controllers\Controller;
use App\Office;
use App\Speciality;
use Illuminate\Http\Request;

class ApiController extends Controller
{



	public function searchDoctorEspecialidad(Request $request)
	{

	


		$search =$request->input('search');
		$speciality=$request->input('speciality');

		if (strlen($search)>0)
		{
			$doctors = Doctor::where('speciality_id',$speciality)->where('name','like',"%$search%")->get();
		}
		else
		{
			$doctors = Doctor::where('speciality_id',$speciality)->get();

		}


		$calculateSpeciality=array();


		foreach ($doctors as $doctor)
		{
			$new = array(
				'id'=>$doctor->id,

				'name'=>$doctor->name,
				'speciality'=>$doctor->speciality->name,
				'price'=>$doctor->speciality->price,
				'Profileimg'=>asset($doctor->Profileimg),
				'StarsEarned'=>$doctor->StarsEarned,
				'StarsMissing'=>$doctor->StarsMissing,
				'stars'=>$doctor->stars,
		
			);

			array_push($calculateSpeciality,$new);

		}


		return json_encode($calculateSpeciality);






	}
		public function searchDoctores(Request $request)
	{

	


		$search =$request->input('search');

		if (strlen($search)>0)
		{
			$doctors = Doctor::where('name','like',"%$search%")->get();
		}
		else
		{
			$doctors = Doctor::all();

		}


		$calculateSpeciality=array();


		foreach ($doctors as $doctor)
		{
			$new = array(
				'id'=>$doctor->id,

				'name'=>$doctor->name,
				'speciality'=>$doctor->speciality->name,
				'price'=>$doctor->speciality->price,
				'Profileimg'=>asset($doctor->Profileimg),
				'StarsEarned'=>$doctor->StarsEarned,
				'StarsMissing'=>$doctor->StarsMissing,
				'stars'=>$doctor->stars,
		
			);

			array_push($calculateSpeciality,$new);

		}


		return json_encode($calculateSpeciality);






	}
	public function searchespecialidades(Request $request )

	{



		$search =$request->input('search');

		if (strlen($search)>0)
		{


			$specialities= Speciality::where('name','like',"%$search%")->get();
		}
		else
		{
			$specialities= Speciality::all();
		}

		$calculateSpeciality=array();


		foreach ($specialities as $speciality)
		{
			$new = array(
				'id'=>$speciality->id,

				'name'=>$speciality->name,
				'countDoctors'=>count($speciality->doctors),
				'stars'=>$speciality->stars,
				'StarsEarned'=>$speciality->StarsEarned,
				'StarsMissing'=>$speciality->StarsMissing,
				'price'=>$speciality->price
			);

			array_push($calculateSpeciality,$new);

		}


		return json_encode($calculateSpeciality);



	}

		public function searchCitas(Request $request )

	{



		$search =$request->input('search');



		if (strlen($search)>0)
		{


			$appointments= Appointment::where('patient_dni',"$search")->orderBy('date','DESC')->get();
		}
		else
		{
			return array();
		}

		$calculateArray=array();


		foreach ($appointments as $appointment)
		{
			$new = array(
				'name'=>$appointment->patient->name,
				'date'=>$appointment->date,
				'time'=>$appointment->time, 
				'price'=>$appointment->price,
				'doctor'=>$appointment->doctor->name,
				'doctor_id'=>$appointment->doctor->id,
				'office'=>$appointment->doctor->office->name,
				'office_id'=>$appointment->doctor->office->id,

				'status'=>$appointment->status
			);

			array_push($calculateArray,$new);

		}


		return json_encode($calculateArray);



	}


}
