@extends('layouts.nav')

@section('content')


<section class="container my-5">
    <div class="row">
        <div class="col">
            
            <h1 class="text-center display-4 text-capitalize color-principal">Agregar médico</h1>
        </div>
    </div>
</section>

<div class="container tarjeta mb-5">
    <div class="row justify-content-center">

        <div class="col-12 col-md-6">
            
                {!! Form::open(['action' => 'DoctorController@store', 'method' => 'POST']) !!}
            <div class="form-group form-inline ">

                <div class="icon-form">
                    <i class="fas fa-user"></i>
                </div>
                 {{Form::text('name', '', ['class'=>'form-control', 'placeholder' => 'Nombre'] )}}
             </div>
            
            <div class="form-group form-inline ">
                 <div class="icon-form">
                    <i class="fas fa-birthday-cake"></i>
                </div>
               
                   {{Form::text('birthdate', '', ['class'=>'form-control datepicker2 ','placeholder' => 'Fecha de nacimiento'] )}}

             </div>

            <div class="form-group form-inline ">
                <div class="icon-form">
                    <i class="fas fa-phone"></i>
                </div>

                 {{Form::text('telephoneNumber', '', ['class'=>'form-control', 'placeholder' => 'Número telefónico'] )}}
             </div>

            <div class="form-group form-inline ">
                <div class="icon-form">
                    <i class="fas fa-sun"></i>
                </div>

                 {{Form::select('turno', ['Vespertino' => 'Vespertino', 'Matutino' => 'Matutino'], null, ['class'=>'form-control'])}}
             </div>

            <div class="form-group form-inline ">
                <div class="icon-form">
                    <i class="fas fa-venus-mars"></i>
                </div>

                 {{Form::select('sexo', ['M' => 'M', 'F' => 'F'], null, ['class'=>'form-control'])}}
             </div>

            <div class="form-group form-inline ">
                <div class="icon-form">
                    <i class="fas fa-address-card"></i>
                </div>

                 {{Form::text('cedula', '', ['class'=>'form-control', 'placeholder' => 'Cedula'] )}}
             </div>

            <div class="form-group form-inline ">
                <div class="icon-form">
                    <i class="fas fa-user-tie"></i>
                </div>

                 {{Form::text('especialidad', '', ['class'=>'form-control', 'placeholder' => 'Especialidad'] )}}
             </div>

             <div>
                 
                <h4 class="h4 lead color-principal my-5">Consultorio (opcional): </h4>
             </div>


            <div class="form-group form-inline ">
                <div class="icon-form">
                    <i class="fas fa-hospital"></i>
                </div>

                 {{Form::text('office_id', '', ['class'=>'form-control', 'placeholder' => 'ID de consultorio'] )}}
             </div>

            <div class="form-group form-inline ">
                <div class="icon-form">
                    <i class="fas fa-clock"></i>
                </div>

                  {{Form::time('inTime', '', ['class'=>'form-control timepicker','placeholder' => 'Hora de Entrada'] )}}

             </div>

            <div class="form-group form-inline ">
                <div class="icon-form">
                    <i class="fas fa-clock"></i>
                </div>
                {{Form::time('outTime', '', ['class'=>'form-control timepicker','placeholder' => 'Hora de Entrada'] )}}

             </div>



            <div>
                
                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-plus"> Agregar</i></button>
            </div>
             {!! Form::close() !!}
         

     
        </div>       

     </div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection