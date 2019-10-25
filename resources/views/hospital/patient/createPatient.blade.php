@extends('layouts.nav-admin')

@section('content')




<div class="container">
  <div class="row">
    <div class="col-12 col-md-6">

      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-sign-in"></i>
          </div>
          <div class="card-title">Login</div>
        </div>

        <div class="card-body">
          <form class="formulario" method="POST"  action="{{ route('login') }}" >
            @csrf

            <div class="form-group form-inline align-items-end align-items-end">
              <div class="icon-form">
                <i class="fal fa-at"></i>
              </div>
              <div class="form-group">
                <label class="bmd-label-floating"> Email</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
              </div>
            </div>

            <div class="form-group form-inline align-items-end align-items-end">
              <div class="icon-form">
                <i class="fal fa-key"></i>
              </div>
              <div class="form-group">
                <label class="bmd-label-floating"> Password</label>
                <input id="password" type="password" class="form-control-claro form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
              </div>
            </div>


          </form>
        </div>




      </div>
    </div>
    <div class="col-12 col-md-6">
      <div class="card card-profile">
        <div class="card-body">

          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
            <div class="fileinput-new thumbnail img-circle img-raised">
              <img src="{{asset('splash/img/user-default.jpg')}}" >
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised" style="height: 100px;width: 100px; overflow: hidden;"></div>
            <div>
              <span class="btn btn-raised btn-round btn-primary btn-file">
                <span class="fileinput-new">Agregar foto</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="..." />
              </span>
              <br />
              <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>



<div class="container  mb-5">
  <div class="row justify-content-center">

    <div class="col-12">
      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-user-md"></i>
          </div>
          <div class="card-title">Datos del médico</div>
        </div>
        <div class="card-body">


          {!! Form::open(['action' => 'PatientController@store', 'method' => 'POST']) !!}
          <div class="form-group form-inline align-items-end">
            <div class="icon-form">
              <i class="fal fa-user"></i>
            </div>

            <div class="form-group">
             <label class="bmd-label-floating">Nombre</label>

             {{Form::text('name', '', ['class'=>'form-control'] )}}
           </div>
         </div>
         <div class="form-group form-inline align-items-end">
          <div class="icon-form">
            <i class="fal fa-id-card"></i>
          </div>

          <div class="form-group">
           <label class="bmd-label-floating"> CURP</label>


           {{Form::text('curp', '', ['class'=>'form-control'] )}}
         </div>
       </div>
       <div class="form-group form-inline align-items-end">
        <div class="icon-form">
          <i class="fal fa-birthday-cake"></i>
        </div>
        <div class="form-group">
          <label class="bmd-label-floating"> Fecha de cumpleaños</label>

          {{Form::text('birthdate', '', ['class'=>'form-control datepicker2 '] )}}
        </div>
      </div>
      <div class="form-group form-inline align-items-end">
        <div class="icon-form">
          <i class="fal fa-phone"></i>
        </div>


        <div class="form-group">
          <label class="bmd-label-floating"> Telefono</label>

          {{Form::number('telephoneNumber', '', ['class'=>'form-control'] )}}
        </div>
      </div>

      <div class="form-group form-inline align-items-end">
        <div class="icon-form">
          <i class="fal fa-venus-mars"></i>
        </div>
                  <div class="form-group">
              
                  <select class="selectpicker" name="sex" id="sex" data-style="select-with-transition" title="Sexo" data-size="sd7">                  
                     <option value="f">Femenino</option>
                     <option value="m">Masculino</option>
                
                  </select>

      
            </div>

      </div>



      <div class="form-group form-inline align-items-end">
        <div class="icon-form">
          <i class="fal fa-home"></i>
        </div>


        <div class="form-group">
          <label class="bmd-label-floating">Direccion</label>

          {{Form::text('address', '', ['class'=>'form-control'] )}}
        </div>
      </div>
      <div class="form-group form-inline align-items-end">
        <div class="icon-form">
          <i class="fal fa-envelope"></i>
        </div>

        <div class="form-group">
          <label class="bmd-label-floating"> Codigo postal</label>

          {{Form::number('postalCode', '', ['class'=>'form-control'] )}}
        </div>
      </div>
      <div class="form-group form-inline align-items-end">
        <div class="icon-form">
          <i class="fal fa-city"></i>
        </div>

        <div class="form-group">
          <label class="bmd-label-floating"> Ciudad</label>

          {{Form::text('city', '', ['class'=>'form-control'] )}}
        </div>
      </div>
      <div class="form-group form-inline align-items-end">
        <div class="icon-form">
          <i class="fal fa-flag"></i>
        </div>

        <div class="form-group">
          <label class="bmd-label-floating"> Pais</label>

          {{Form::text('country', '', ['class'=>'form-control'] )}}
        </div>
      </div>
      <div class="form-group form-inline align-items-end">
        <div class="icon-form">
          <i class="fal fa-id-card"></i>
        </div>

            <div class="form-group">
              
                  <select class="selectpicker" name="doctor_id" id="doctor_id" data-style="select-with-transition" title="Selecciona un consultorio" data-size="sd7">

                    <?php foreach ($doctors as $doctor ): ?>
                      
                    <option value="{{ $doctor->id}}">{{ $doctor->name }}</option>
                
                    <?php endforeach ?>
                  </select>

      
            </div>

      </div>
      
      <div class="my-5 text-right text-md-center">

        <button type="submit" class="btn btn-primary "><i class="fal fa-plus"> Agregar</i></button>
      </div>
      {!! Form::close() !!}
    </div>

    
  </div>
</div>


</div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection