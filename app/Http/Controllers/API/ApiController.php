<?php

namespace App\Http\Controllers\API;


use App\Appointment;
use App\Conditions;
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


			    	
			$doctors=Doctor::
            join('doctor_speciality','doctor_speciality.doctor_id','=','doctors.id')
            ->select('doctors.*')
            ->where('doctor_speciality.speciality_id', $speciality)
            ->where('doctors.name','like',"%$search%")
            ->get();

		}
		else
		{
			$doctors = Speciality::find($speciality)->doctors;

		}


		$calculateSpeciality=array();


		foreach ($doctors as $doctor)
		{
			$new = array(
				'id'=>$doctor->id,

				'name'=>$doctor->name,
				'specialities'=>$doctor->specialities,
				'MinMaxCost'=>$doctor->MinMaxCost,
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
				'specialities'=>$doctor->specialities,
				'MinMaxCost'=>$doctor->MinMaxCost,
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



	/*====================================
	=            Appointmnent            =
	====================================*/
	
	


	
	/*=====  End of Appointmnent  ======*/
	
	public function AppointmentGetTime(Request $request )
	{


		$id= $request->input('doctor');
		$date= $request->input('date');

		$doctor= Doctor::find($id);


		$appointments = Appointment::where('doctor_id',$id)->where('date',$date)
		//->where('condition_id',Conditions::Id('pending'))->orWhere('condition_id',Conditions::Id('accepted'))
		->get();






		$hours = array();

		foreach ($appointments as $appointment) 
		{

			$time = $appointment->time[0].$appointment->time[1].":"
			//$minute =
			.$appointment->time[3].$appointment->time[4];

			
			if($appointment->condition_id==Conditions::Id('pending'))
			{
				array_push($hours,$time);

			}
			else if($appointment->condition_id==Conditions::Id('accepted'))
			{

				array_push($hours,$time);
			}

			
		}






		$calculateArray=array(
			'inTime'=>$doctor->inTime,
			'outTime'=>$doctor->outTime,
			'hours'=>$hours, 
		);

		

		return json_encode($calculateArray);




	}


	public function getAppointmentPatient(Request $request )
	{



		$search =$request->input('id');



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
				'patient_name'=>$appointment->patient->name,
				'patient_dni'=>$appointment->patient->dni,
				'date'=>$appointment->date,
				'time'=>$appointment->time, 
				'price'=>$appointment->price,
				'doctor_name'=>$appointment->doctor->name,
				'doctor_id'=>$appointment->doctor->id,
				'office'=>$appointment->doctor->office->name,
				'office_id'=>$appointment->doctor->office->id,
				'status'=>$appointment->status
			);

			array_push($calculateArray,$new);

		}


		return json_encode($calculateArray);



	}



	public function getAppointmentDoctor(Request $request )
	{



		$search =$request->input('id');



		if (strlen($search)>0)
		{


			$appointments= Appointment::where('doctor_id',"$search")->orderBy('date','DESC')->get();
		}
		else
		{
			return array();
		}

		$calculateArray=array();


		foreach ($appointments as $appointment)
		{
			$new = array(
				'patient_name'=>$appointment->patient->name,
				'patient_dni'=>$appointment->patient->dni,
				'date'=>$appointment->date,
				'time'=>$appointment->time, 
				'price'=>$appointment->price,
				'doctor_name'=>$appointment->doctor->name,
				'doctor_id'=>$appointment->doctor->id,
				'office'=>$appointment->doctor->office->name,
				'office_id'=>$appointment->doctor->office->id,
				'status'=>$appointment->status
			);

			array_push($calculateArray,$new);

		}


		return json_encode($calculateArray);



	}



	/*===========================================
	=            Get office's doctos            =
	===========================================*/
	
	
	



	public function get_officesDoctors($id)
	{

		$office = Office::find($id);

		$calculateSpeciality=array();


		foreach ($office->doctors as $doctor)
		{
			$spe= array();

			foreach ($doctor->specialities as $special) 
			{

				$new1 = array(
					'id'=>$special->id,
					'name'=>$special->name
				);
				
				array_push($spe,$new1);

			}

			$new = array(
				'id'=>$doctor->id,
				'name'=>$doctor->name,
				'speciality'=>$spe
				
			);
			array_push($calculateSpeciality,$new);


		}


		return json_encode($calculateSpeciality);



	}

	/*=====  End of Get office's doctos  ======*/

}
