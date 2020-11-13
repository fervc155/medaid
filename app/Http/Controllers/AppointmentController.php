<?php

namespace App\Http\Controllers;
use App\Appointment;
use App\Condition;
use App\Conditions;
use App\Doctor;
use App\Notification;
use App\Office;
use App\Patient;
use App\Payment;
use App\Privileges;
use App\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Storage;

class AppointmentController extends Controller
{
  //Lista de citas
  public function index()
  {






        Notification::toAdmin(array(
            'subject'=>'Notificacion nueva',
            'text'=>"haz ingresado a las citas",
            'url'=> url('appointment')
        ));









    if (Auth::user()->isPatient()) {
      $appointments = Appointment::where('patient_dni', '=', Auth::user()->profile()->id)->get();


      return view('hospital.appointment.indexAppointment', compact('appointments'));
    }



    if (Auth::user()->isDoctor()) {
      $appointments = Appointment::where('doctor_id', '=', Auth::user()->profile()->id)->get();

      return view('hospital.appointment.indexAppointment', compact('appointments'));
    }




    if (Auth::user()->isOffice()) {


      $appointments =  Appointment::join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
        ->select('appointments.*')
        ->where('doctors.office_id', Auth::user()->profile()->id)
        ->get();




      return view('hospital.appointment.indexAppointment', compact('appointments'));
    }

    if (Auth::user()->Admin()) {
      $appointments = Appointment::all();
      return view('hospital.appointment.indexAppointment', compact('appointments'));
    }



    return view('admin');
  }

  //Agregar cita
  public function create($id = '', $spe = '')
  {




    $patients = Patient::active();
    $offices = Office::active();


    if (Auth::user()->isDoctor()) {
         
      $id = Auth::user()->profile()->id;
    }



    if ($id != '' && $spe != '') {


      $_doctor = Doctor::find($id);
      $_speciality_id = $spe;

      return view('hospital.appointment.createAppointment', compact('_doctor', 'patients', 'offices', '_speciality_id'));
    }

    if ($id != '') {
      $_doctor = Doctor::find($id);



      return view('hospital.appointment.createAppointment', compact('_doctor', 'patients', 'offices'));
    } else {

      return view('hospital.appointment.createAppointment', compact('patients', 'offices'));
    }
  }

  //Método store, para almacenar cita
  public function store(Request $request)
  {
    $this->validate($request, [
      'date' => 'required|date',
      'time' => 'required',
      'speciality_id' => 'required|numeric',
      'description' => 'required',
      'doctor_id' => 'required|numeric',
      'patient_dni' => 'required|numeric',

    ]);

    //Crear cita
    $appointment = new Appointment;


    $appointment->date = $request->input('date');
    $appointment->time = $request->input('time');
    $appointment->doctor_id = $request->input('doctor_id');
    $appointment->speciality_id = $request->input('speciality_id');
    $appointment->cost = Speciality::find($appointment->speciality_id)->first()->cost;

    $appointment->patient_dni = $request->input('patient_dni');

    $appointment->description = $request->input('description');
    $appointment->condition_id = Conditions::id('pending');
    $appointment->save();


    if(Auth::user()->isPatient())
    {

       $stripeCustomer = Auth::user()->createOrGetStripeCustomer();


        return redirect('payment/'.$appointment->id."/user")->with('newAppointment',true);
    
    }
    return redirect($appointment->profileUrl)->with('success', '¡La cita ha sido creada con éxito!');

  }

  //Información de cita
  public function show($id)
  {

    $appointment = Appointment::find($id);

    if (Auth::user()->isPatient()) {
      if (Auth::user()->profile()->id == $appointment->patient_dni) {
        return view('hospital.appointment.showAppointment', compact('appointment'))->with('patient', $appointment->patient);
      }
    }


    if (Auth::user()->isOffice()) {
      if (Auth::user()->profile()->id == $appointment->doctor->office_id) {
        return view('hospital.appointment.showAppointment', compact('appointment'))->with('patient', $appointment->patient);
      }
    }



    if (Auth::user()->isDoctor()) {

      $patients =  Patient::join('appointments', 'appointments.patient_dni', '=', 'patients.dni')
        ->select('patients.*', 'appointments.*')
        ->where('appointments.doctor_id', Auth::user()->profile()->id)
        ->get();

      if (Auth::user()->profile()->id == $appointment->doctor_id) {
        return view('hospital.appointment.showAppointment', compact('appointment'))->with('patients', $appointment->patient);
      }

      foreach ($patients as $patient) {
        foreach ($patient->appointments as $ap) {
          if ($ap->id == $appointment->id) {
            return view('hospital.appointment.showAppointment', compact('appointment'))->with('patients', $appointment->patient);
          }
        }
      }

      return view('admin');
    }




    if (Auth::user()->isOffice()) {

      if (Auth::user()->profile()->id == $appointment->doctor->office_id) {

        return view('hospital.appointment.showAppointment', compact('appointment'))->with('patients', $appointment->patient);
      }
    }

    if (Auth::user()->Admin()) {




      return view('hospital.appointment.showAppointment', compact('appointment'))->with('patient', $appointment->patient);
    }

    return view('admin');
  }

  //Actualizar cita
  public function edit(Appointment $appointment)
  {

 
    if ($appointment->condition_id == Conditions::Id('pending') || $appointment->condition_id== Conditions::Id('lost')) {

 

    if (Auth::user()->isPatient()) {
      if (Auth::user()->profile()->id != $appointment->patient_dni) {
        return view('admin');
      }
    }



    if (Auth::user()->isDoctor()) {
      if (Auth::user()->profile()->id != $appointment->doctor_id) {
        return view('admin');
      }
    }




    if (Auth::user()->isOffice()) {
      if (Auth::user()->profile()->id != $appointment->doctor->office_id) {
        return view('admin');
      }
    }



    if (Auth::user()->Patient()) {





      $conditions = Condition::all();
      return view('hospital.appointment.editAppointment', compact('appointment', 'conditions'));

    }
           return back()->with('error', 'Solo se pueden editar las citas pendientes o perdidas');

    }


    return view('admin');
  }

  //Método update 
  public function update(Request $request, Appointment $appointment)
  {

     $data = request()->validate([
                'date' => 'nullable',
              ]);


     if(!isset($data['date']))
     {



  if (Auth::user()->Doctor()) {
 
            $data = request()->validate([
                'file' => 'required',
              ]);

             $prescription = Prescription::find($request->input('prescription_id'));
 
             $prescription->content = $request->input('content');
 
            $file_path =  $data['file']->store('profile', 'public');

            $prescription->file = $file_path;

             $prescription->save();
 
             return back()->with('success', 'Receta actualizada correctamente');


    }
    }
    if (Auth::user()->Patient()) {

      $this->validate($request, [
        'date' => 'required|date',
        'time' => 'required',
        'description' => 'required',
        'appointment_id' => 'required|numeric'

      ]);


      $appointment = Appointment::find($request->input('appointment_id'));
      $appointment->date = $request->input('date');
      $appointment->time = $request->input('time');

      $appointment->description = $request->input('description');


      if($appointment->condition_id==Conditions::Id('lost')  && null!=$appointment->payment)
        $appointment->condition_id = Conditions::Id('accepted');

      if($appointment->condition_id==Conditions::Id('lost')  && null==$appointment->payment)
        $appointment->condition_id = Conditions::Id('pending');
      

      $appointment->save();

      return redirect($appointment->profileUrl)->with('success', '¡La cita ha sido actualizada con éxito!');
    }

    return view('admin');
  }


 
  //cancelar cita
  // public function destroy(Appointment $appointment)
  // {
  //   if (Auth::user()->Patient()) {

  //     $appointment->condition_id = Conditions::Id('cancelled');
  //     $appointment->save();

  //     return redirect($appointment->profileUrl)->with('success', '¡La cita ha sido cancelada con éxito!');
  //   }
  //   return view('admin');
  // }



  //cancelar cita
  public function cancelled(Appointment $appointment)
  {
    if (Auth::user()->Patient()) {
      $appointment->condition_id = Conditions::Id('cancelled');
      $appointment->save();

      return redirect($appointment->profileUrl)->with('success', '¡La cita ha sido cancelada con éxito!');
    }
    return view('admin');
  }



  //atender
  public function attend(Appointment $appointment)
  {

    if(null==$appointment->payment)
    {

             return view('hospital.payment.create')->with('appointment',$appointment)->with('nextStatus','completed');

    }

      
      return $this->complete($appointment);

  }

  //Atender cita
  public function complete(Appointment $appointment)
  {
    if (Auth::user()->Patient()) {
      $appointment->condition_id = Conditions::Id('completed');
      $appointment->save();

      return redirect($appointment->profileUrl)->with('success', '¡La cita ha sido atendida con éxito!');
    }
    return view('admin');
  }

  //acpetar cita
  public function accepted(Appointment $appointment)
  {
    if (Auth::user()->Patient()) {
      $appointment->condition_id = Conditions::Id('accepted');
      $appointment->save();

      return redirect($appointment->profileUrl)->with('success', '¡La cita ha sido aceptada con éxito!');
    }
  }

  // //rechazar cita
  // public function rejected(Appointment $appointment)
  // {
  //   if (Auth::user()->Patient()) {

  //     $appointment->condition_id = Conditions::Id('rejected');
  //     $appointment->save();

  //     return redirect($appointment->profileUrl)->with('success', '¡La cita ha sido rechazada con éxito!');
  //   }
  //   return view('admin');
  // }

  //pendiente cita
  public function pending(Appointment $appointment)
  {
    if (Auth::user()->Patient()) {
      $appointment->condition_id = Conditions::Id('pending');
      $appointment->save();

      return redirect($appointment->profileUrl)->with('success', '¡La cita ha sido rechazada con éxito!');
    }
    return view('admin');
  }
  //tarde cita
  public function late(Appointment $appointment)
  {
    if (Auth::user()->Patient()) {
      $appointment->condition_id = Conditions::Id('late');
      $appointment->save();

      return redirect($appointment->profileUrl)->with('success', '¡La cita ha sido rechazada con éxito!');
    }
    return view('admin');
  }
  //perdida cita
  public function lost(Appointment $appointment)
  {
    if (Auth::user()->Patient()) {
      $appointment->condition_id = Conditions::Id('lost');
      $appointment->save();

      return redirect($appointment->profileUrl)->with('success', '¡La cita ha sido rechazada con éxito!');
    }
    return view('admin');
  }


   public function download($id)
    {
        $prescription = Prescription::find($id);
        $file_path = $prescription->file;

        return Storage::disk('public')->download($file_path);
    }



  /*==========================================
  =            actualizar estados            =
  ==========================================*/

  /*=====  End of actualizar estados  ======*/
}
