@extends('layouts.app')

@section('content')

<section class="container my-5">
    <div class="row">
        <div class="col">
            
            <h1 class="text-center display-4 text-capitalize color-principal">Agregar Paciente</h1>
        </div>
    </div>
</section>

<div class="container tarjeta mb-5">
    <div class="row justify-content-center">

        <div class="col-12 col-md-6">

          {!! Form::open(['action' => 'PatientController@store', 'method' => 'POST']) !!}
            <div class="form-group form-inline">
              <div class="icon-form">
                    <i class="fas fa-user"></i>
                </div>
               {{Form::text('name', '', ['class'=>'form-control', 'placeholder' => 'Nombre'] )}}
           </div>
           <div class="form-group form-inline">
            <div class="icon-form">
                    <i class="fas fa-id-card"></i>
                </div>

               {{Form::text('curp', '', ['class'=>'form-control', 'placeholder' => 'CURP'] )}}
           </div>
           <div class="form-group form-inline">
            <div class="icon-form">
                    <i class="fas fa-birthday-cake"></i>
            </div>
            
            {{Form::date('birthdate', '', ['class'=>'form-control', 'placeholder' => 'Fecha de nacimiento'] )}}
            </div>
            <div class="form-group form-inline">
              <div class="icon-form">
                    <i class="fas fa-phone"></i>
                </div>
               {{Form::number('telephoneNumber', '', ['class'=>'form-control', 'placeholder' => 'Número telefónico'] )}}
           </div>
           <div class="form-group form-inline">
            <div class="icon-form">
                    <i class="fas fa-venus-mars"></i>
                </div>
                 {{Form::select('sex', ['M' => 'M', 'F' => 'F'], null, ['class'=>'form-control'])}}
           </div>
           <div class="form-group form-inline">
            <div class="icon-form">
                    <i class="fas fa-home"></i>
                </div>
               {{Form::text('address', '', ['class'=>'form-control', 'placeholder' => 'Calle, número y colonia'] )}}
           </div>
           <div class="form-group form-inline">
            <div class="icon-form">
                    <i class="fas fa-envelope"></i>
            </div>
               {{Form::number('postalCode', '', ['class'=>'form-control', 'placeholder' => 'Código Postal'] )}}
           </div>
           <div class="form-group form-inline">
            <div class="icon-form">
                    <i class="fas fa-city"></i>
                </div>
               {{Form::text('city', '', ['class'=>'form-control', 'placeholder' => 'Ciudad'] )}}
           </div>
           <div class="form-group form-inline">
            <div class="icon-form">
                    <i class="fas fa-flag"></i>
              </div>
               {{Form::text('country', '', ['class'=>'form-control', 'placeholder' => 'País'] )}}
           </div>
           <div class="form-group form-inline">
            <div class="icon-form">
                    <i class="fas fa-id-card"></i>
            </div>
               {{Form::text('doctor_id', '', ['class'=>'form-control', 'placeholder' => 'ID del médico del paciente'] )}}
           </div>
      
            <div>
                
                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-plus"> Agregar</i></button>
            </div>
       {!! Form::close() !!}
   </div>

   

</div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection