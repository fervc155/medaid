@extends('layouts.nav')

@section('content')


<section class="container my-5">
    <div class="row">
        <div class="col">
            
            <h1 class="text-center display-4 text-capitalize color-principal">Editar Consultorio</h1>
        </div>
    </div>
</section>



<div class="container tarjeta">
  <div class="row justify-content-center">

    <div class="col-12 col-md-6">
       
      {!! Form::open(['action' => ['OfficeController@update', $office->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
      
      <div class="form-group form-inline">
        <div class="icon-form">
            <i class="fas fa-user"></i>
        </div>
       {{Form::text('name', $office->name, ['class'=>'form-control', 'placeholder' => 'Nombre'] )}}
     </div>
     <div class="form-group form-inline">
      <div class="icon-form">
            <i class="fas fa-home"></i>
        </div>
      {{Form::text('address', $office->address, ['class'=>'form-control', 'placeholder' => 'Calle, número y colonia'] )}}
    </div>
    <div class="form-group form-inline">
      <div class="icon-form">
            <i class="fas fa-envelope"></i>
        </div>
     {{Form::text('postalCode', $office->postalCode, ['class'=>'form-control', 'placeholder' => 'Código Postal'] )}}
   </div>
   <div class="form-group form-inline">
    <div class="icon-form">
            <i class="fas fa-city"></i>
        </div>
     {{Form::text('city', $office->city, ['class'=>'form-control', 'placeholder' => 'Ciudad'] )}}
   </div>
   <div class="form-group form-inline">
    <div class="icon-form">
            <i class="fas fa-flag"></i>
        </div>
     {{Form::text('country', $office->country, ['class'=>'form-control', 'placeholder' => 'País'] )}}
   </div>
    <div class="input-group ">
      <div class="custom-file">
        
        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>

        <input type="file" class="custom-file-input" id="inputGroupFile01"
          aria-describedby="inputGroupFileAddon01">
      </div>
    </div>



   {{ Form::hidden('_method','PUT')}}

    <div class="my-3">
       <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-plus"> Agregar</i></button>
    </div>

   {!! Form::close() !!}
 </div>



</div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection