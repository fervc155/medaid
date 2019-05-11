@extends('layouts.nav')

@section('content')


<section class="container my-5">
    <div class="row">
        <div class="col">
            
            <h1 class="text-center display-4 text-capitalize color-principal">Agendar Cita</h1>
        </div>
    </div>
</section>

<!-- Se crea un formulario cuya información se envía el método "Store" en el controlador
  utilizando el método POST de HTPP-->

<div class="container tarjeta mb-5">
    <div class="row justify-content-center">

        <div class="col-12 col-md-6">
        <!-- El contenido del formulario se enviará al método 'store' con el método POST -->
        {!! Form::open(['action' => 'AppointmentController@store', 'method' => 'POST']) !!}

            <div class="form-group form-inline">

              <div class="icon-form">
                <i class="fas fa-calendar-week"></i>
              </div>
               {{Form::date('date', '', ['class'=>'form-control'] )}}
           </div>

           <div class="form-group form-inline">
             <div class="icon-form">
                <i class="fas fa-clock"></i>
              </div>

               {{Form::time('time', '', ['class'=>'form-control'] )}}
           </div>

           <div class="form-group form-inline">
             <div class="icon-form">
                <i class="fas fa-money-bill-wave"></i>
              </div>
               {{Form::number('cost', '', ['class'=>'form-control'] )}}
           </div>

           <div class="form-group form-inline">
             <div class="icon-form">
                <i class="fas fa-quote-left"></i>
              </div>
               {{Form::text('description', '', ['class'=>'form-control', 'placeholder' => 'Razón o motivo'] )}}
           </div>

           <div class="form-group form-inline">
             <div class="icon-form">
                <i class="fas fa-user-md"></i>
              </div>
               {{Form::text('doctor_id', '', ['class'=>'form-control', 'placeholder' => 'ID del médico'] )}}
           </div>

           <div class="form-group form-inline">
             <div class="icon-form">
                <i class="fas fa-user-injured"></i>
              </div>
               {{Form::text('patient_dni', '', ['class'=>'form-control', 'placeholder' => 'ID del paciente'] )}}
           </div>

           <div class="form-group form-inline">
             <div class="icon-form">
                <i class="fas fa-hospital"></i>
              </div>
               {{Form::text('office_id', '', ['class'=>'form-control', 'placeholder' => 'ID del consultorio'] )}}
           </div>
            <div class="my-3">
               <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-plus"> Agregar</i></button>
             </div>
   </div>

   

</div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection