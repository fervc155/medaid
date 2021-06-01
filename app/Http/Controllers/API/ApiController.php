<?php

namespace App\Http\Controllers\API;


use App\Appointment;
use App\Conditions;
use App\Doctor;
use App\Http\Controllers\Controller;
use App\Office;
use App\Patient;
use App\Privileges;
use App\Speciality;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ApiController extends Controller
{


  public function doctorSpecialities(Doctor $doctor){

    $array  =[];


    foreach($doctor->specialities as $speciality){
      $array[]=[
        'id'=>$speciality->id,
        'name'=>$speciality->name,
        'cost'=>$speciality->cost,
        'price'=>$speciality->price

      ];
    }

    return json_encode($array);

  }
	public function searchDoctorEspecialidad(Request $request)
	{




		$search =$request->input('search');
		$speciality=$request->input('speciality');




			$doctors = Speciality::find($speciality)->doctors;

			$users =  Collection::make(new User);

 				foreach ($doctors as $doctor) 
 				{
 					$users->push($doctor->user());
 				}

		if (strlen($search)>0)
		{

 			
			     $users =User::search($search,2,$users);

 
		}
	 


		$calculateSpeciality=array();


		foreach ($users as $user)
		{
			$new = array(
				'id'=>$user->profile()->id,
				'Profileimg'=>$user->Profileimg,

				'name'=>$user->name,
				'specialities'=>$user->profile()->specialities,
				'MinMaxCost'=>$user->profile()->MinMaxCost,
 				'StarsEarned'=>$user->profile()->StarsEarned,
				'StarsMissing'=>$user->profile()->StarsMissing,
				'stars'=>$user->profile()->stars,

			);

			array_push($calculateSpeciality,$new);

		}


		return json_encode($calculateSpeciality);






	}


  public function get_patients(){


    $patients=Patient::active();

    $array=[];

    foreach($patients as $patient){
      $array[]=[
        'id'=>$patient->dni,
        'name'=>$patient->name

      ];
    }

    return json_encode($array);


  }
  public function get_offices(){


    $offices=Office::active();

    $array=[];

    foreach($offices as $office){
      $array[]=[
        'id'=>$office->id,
        'name'=>$office->name,
        'address' => $office->city.' '.$office->postalCode.' Direccion '.$office->address,
        'Profileimg'=>$office->Profileimg,
        'map'=>$office->map,


      ];
    }

    return json_encode($array);


  }

    public function get_officesSpecialities(Office $office){


 


    $array=[];

    foreach($office->doctors as $doctor){
      foreach ($doctor->specialities as $spe) {

        $array[]=[
          'id'=>$spe->id,
          'name'=>$spe->name,

        ];

      }
    }
    $array = array_merge_recursive($array,$array);

    return (array_values(array_unique($array, SORT_REGULAR)));


  }

  public function get_doctorBySpeciality( $speciality_id, $office_id){

    $doctors= Doctor::join('doctor_specialities','doctors.id','doctor_specialities.doctor_id')
    ->select('doctors.*')
    ->where('doctors.office_id',$office_id)
    ->where('doctor_specialities.speciality_id',$speciality_id)
    ->get();


    $array = [];

    foreach($doctors as $doctor){



      $array[]=[
        'id'=>$doctor->id,
        'name'=>$doctor->name,
        'cost'=>$doctor->hasSpeciality($speciality_id)->cost,
        'price'=>$doctor->hasSpeciality($speciality_id)->price,
        'stars'=>$doctor->stars,
        'Profileimg'=>$doctor->Profileimg,

      ];
    } 


    return json_encode($array);




  }

	public function searchDoctores(Request $request)
	{




 
				$search =$request->input('search');

		if (strlen($search)>0)
		{
			$users = User::search($search,Privileges::Id('doctor'));
		}
		else
		{
			$users =  User::where('id_privileges',Privileges::Id('doctor'))->get();

		}
 

		$calculateSpeciality=array();




		foreach ($users as $user)
		{


		 
			$new = array(
				'id'=>$user->id,

				'name'=>$user->name,
				'Profileimg'=>$user->profileImg,
				'specialities'=>$user->profile()->specialities,
				'MinMaxCost'=>$user->profile()->MinMaxCost,
				'Profileimg'=>$user->Profileimg,
				'StarsEarned'=>$user->profile()->StarsEarned,
				'StarsMissing'=>$user->profile()->StarsMissing,
				'stars'=>$user->profile()->stars,

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


			$specialities= Speciality::search($search);
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


	public function getAppointment(Request $request )
	{



		$id =$request->input('id');


 

		$appointment= Appointment::find($id);
		
		if(null === $appointment)
			return array();
		
 
		 
			$array = array(
				'id'=>$appointment->id, 
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

			 


		return json_encode($array);



	}


	public function getAppointmentPatient(Request $request )
	{



		$id =$request->input('id');

		$user =User::find($id);

		if(!$user->isPatient())
		{
						return array();

		}

		$search = $user->profile()->id;

		if (strlen($search)>0)
		{


			$appointments= Appointment::where('patient_dni',$search)->orderBy('date','DESC')->get();
		}
		else
		{
			return array();
		}

		$calculateArray=array();


		foreach ($appointments as $appointment)
		{
			$new = array(
				'id'=>$appointment->id, 
				'patient_name'=>$appointment->patient->user()->name,
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



	

		$id =$request->input('id');

		$user =User::find($id);

		if(!$user->isDoctor())
		{
						return array();

		}

		$search = $user->profile()->id;

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
				'id'=>$appointment->id, 
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
					'name'=>$special->name,
					'price'=>$special->price
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
