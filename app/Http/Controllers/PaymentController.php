<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Conditions;
use App\Invoice;
use App\Payment;
use App\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->isPatient())
        {

           $payments = Payment::join('appointments','payments.appointment_id','appointments.id')
           ->select('payments.*')
           ->where('appointments.patient_dni',Auth::user()->profile()->id)
           ->get();



       }    

       if(Auth::user()->isDoctor())
       {

           $payments = Payment::join('appointments','payments.appointment_id','appointments.id')
           ->select('payments.*')
           ->where('appointments.doctor_id',Auth::user()->profile()->id)
           ->get();




       }    


       if(Auth::user()->isOffice())
       {



           $payments = Payment::join('appointments','payments.appointment_id','appointments.id')
           ->join('doctors','appointment.doctor_id','doctors.id')
           ->select('payments.*')
           ->where('doctors.office_id',Auth::user()->profile()->id)
           ->where('appointments.doctor_id','doctors.id')
           ->get();




       }  

       if(Auth::user()->admin())
       {

        $payments = Payment::all();

    }    
    return view('hospital.payment.indexPayment')->with('payments',$payments);

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function then(Appointment $appointment)
    {
        return redirect($appointment->profileUrl);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function online(Request $request,Appointment  $appointment)
    {

      $data = $request->validate([
        'token-payment'=>'required',
    ]) ;

      $cost = $appointment->cost * 100;

      $stripeCharge = Auth::user()->charge($cost, $data['token-payment']);


      $payment= new Payment;


      $payment->cost =$appointment->cost;
      $payment->appointment_id =$appointment->id;
      $payment->online = 1;
      $payment->save();

      $appointment->condition_id = Conditions::Id('accepted');
      $appointment->save();


      return redirect($appointment->profileUrl)->with('success','Cita registrada correctamente');
  }

  public function invoice(Request $request,Appointment  $appointment)
  {


      $cost = $appointment->cost * 100;

      $invoiceStripe = Auth::user()->invoiceFor('Cita de: '.$appointment->speciality->name,$cost);





      $payment= new Payment;


      $payment->cost =$appointment->cost;
      $payment->appointment_id =$appointment->id;
      $payment->online = 1;
      $payment->save();

      
      $invoice = new Invoice;
      $invoice->id = $invoiceStripe->id;
      $invoice->payment_id = $payment->id;
      $invoice->save();

      $appointment->condition_id = Conditions::Id('accepted');
      $appointment->save();


      return redirect($appointment->profileUrl)->with('success','Cita registrada correctamente');
  }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $appointments = Auth::user()->profile()->appointments;



        return view('hospital.payment.create')->with('appointments',$appointments);
    }

    public function doctor(Appointment $appointment)
    {

        if(!Auth::user()->isDoctor())
            return back()->with('alert' ,'No eres un medico');


        if(null!=$appointment->payment)
            return back()->with('alert','Esta cita ya esta pagada');


        return view('hospital.payment.create')->with('appointment',$appointment);
    }

    public function user(Appointment $appointment)
    {
       if(!Auth::user()->isPatient())
           return back()->with('alert' ,'No eres un paciente');

       if(null!=$appointment->payment)
        return back()->with('alert','Esta cita ya esta pagada');

    $stripeCustomer = Auth::user()->createOrGetStripeCustomer();

    return view('hospital.payment.createPayment')->with('intent',auth::user()->createSetupIntent())->with('appointment',$appointment)->with('price',$appointment->price);
    
    
}

   /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'appointment_id'=>'required|integer',
            'description'=>'nullable',
            'nextStatus'=>'nullable|string'
        ]);




        $appointment = Appointment::find($data['appointment_id']);
        $payment = new Payment;

        $payment->cost = $appointment->cost;
        $payment->description = $data['description']??null;
        $payment->appointment_id = $appointment->id;
        $payment->online=0;

        if(isset($data['nextStatus']))
        {
          $appointment->condition_id = Conditions::Id($data['nextStatus']);

          
            $appointment->save();
            $payment->save();

                return redirect($appointment->profileUrl)->with('success','pago registrado correctamente');


        } 


        if($appointment->condition->status->name=="pending")
        {
            $appointment->condition_id = Conditions::Id('accepted');
            $appointment->save();
        }

        $payment->save();
        return redirect('payment')->with('success','pago registrado correctamente');
    }



    // public function other(Request $request)
    // {
    //     $data= $request->validate([

    //         'description'=>'nullable',
    //         'cost'=>'required|numeric'
    //     ]);



    //     $payment = new Payment;

    //     $payment->cost = $data['cost'];
    //     $payment->description = $data['description']??null;

    //     $payment->online=0;

    //     $payment->save();


    //     return redirect('payment')->with('success','pago registrado correctamente');
    // }

public function billingPortal()
{


      //  return $invoices;
    return Auth::user()->redirectToBillingPortal();
}
}
