<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Conditions;
use App\Payment;
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
        //
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
