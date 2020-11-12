@extends('layouts.nav-admin')

@section('content')

<div class="container mt-5">
  <div class="row">
    <div class="col">
      
        

      @if(isset($newAppointment))
          <div class="alert alert-success">Cita creada correctamente</div>
        
        <form method="post" action="{{route('payment.then',['appointment'=>$appointment->id])}}" class="form">
          @csrf
          <button class="btn btn-info btn-block">Prefiero pagar en la cita</button>
        </form>
        @endif
  
    </div>
  </div>
</div>

<div class="container">
	<div class="row">

    <div class="col-12">

      <div class="card">

        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-calendar-check"></i>
          </div>
          <div class="card-title">Requiero recibo</div>
        </div>


        <div class="card-body">

          <h2 class="h3">Costo: {{$price}}</h2>
          <form action="{{route('payment.store.online',['appointment'=>$appointment->id])}}" method="post" id="payment-form">
           @csrf
           <div class="form-row">
            <label for="card-element">
              Tarjeta de debito o credito
            </label>
            <div id="card-element">
              <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
          </div>
          <input type="hidden" value="" name="token-payment">
          <button  type="button" id="card-button" class="btn btn-primary btn-block mt-5" data-secret="{{ $intent->client_secret }}">
            Pagar ahora
          </button>
          <button type="submit" class="d-none" id="pay-button"></button>
        </form>
        

   
    </div>
  </div>
</div>
  <div class="col">

      <div class="card">

        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-calendar-check"></i>
          </div>
          <div class="card-title">Requiero factura</div>
        </div>


        <div class="card-body">

         
          <h2 class="h3">Costo: {{$price}}</h2>

          <p>
            MedAid No guarda informacion de las tarjetas de credito, Si necesitas factura, ingresa al  <a href="{{route('billingPortal')}}"   target="_blank">Portal del comprador en STRIPE dando click aqui</a> y agrega tu metodo de pago. Una vez realizado procede a hacer el pago 
          </p>

           <form action="{{route('payment.store.invoice',['appointment'=>$appointment->id])}}" method="post" id="payment-form">
            @csrf
            <button type="submit" class="btn btn-primary">Pagar y facturar</button>
           </form>
  
   
    </div>
  </div>
</div>

@endsection

@push('js')


<script src="https://js.stripe.com/v3/"></script>


<script>


	$(document).ready(function()
	{

// Create a Stripe client.
var stripe = Stripe('pk_test_51Hm4SrDxe4dXiGj7N2DdM2TiLJgN9LVL9tLx7H9UhrX6xz67kHacNLxMmf5IuQYGVL4aY9uyR9BCngv9g3LOMuEM00Jni03sYk');


// Create an instance of Elements.
const elements = stripe.elements();
const cardElement = elements.create('card');

cardElement.mount('#card-element');




// 

const cardHolderName = "Fernando";
const cardButton = document.getElementById('card-button');

cardButton.addEventListener('click', async (e) => {
  const { paymentMethod, error } = await stripe.createPaymentMethod(
    'card', cardElement, {
      billing_details: { name: cardHolderName.value }
    }
    );

  if (error) {
        // Display "error.message" to the user...
      } else {
        $('[name="token-payment"]').val(paymentMethod.id)

        $('#pay-button').click()
        // The card has been verified successfully...
      }
    });

})

</script>


@endpush
