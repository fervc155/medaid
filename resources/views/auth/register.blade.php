@extends('layouts.nav-login')

@section('content')

<main class="register" style="background-image: url({{asset('splash/header/login.jpg')}});">

  <secton class="container mt-5 ">
    <div class="row  justify-content-center">
      <div class="col-11 col-sm-8  col-lg-6   "> 





        <div class="card card-blog sombra">
          <div class="card-cabecera bg-info sombra-2">

            <div class="card-title text-center text-uppercase text-white h2 sans-serif ">
              {{__('Registro')}}
            </div>
          </div>

          <div class="card-body">
            <form method="POST" class="formulario" action="{{ route('register') }}" enctype="multipart/form-data">
              @csrf

              <div class="form-group form-inline align-items-end ">
                <div class="icon-form ">
                  <i class="fas fa-user"></i>
                </div>

                <div class="form-group">
                 <label class="bmd-label-floating"> Nombre</label>

                 <input id="name" type="text" class=" form-control-claro form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" " required autofocus>

                 @if ($errors->has('name'))
                 <span class="invalid-feedback lead text-light" role="alert">
                  <strong>{{ $errors->first('name') }} </strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group form-inline align-items-end ">
              <div class="icon-form ">
                <i class="fas fa-at"></i>
              </div>

              <div class="form-group">

                <label class="bmd-label-floating"> Correo electronico</label>

                <input id="email" type="email" class=" form-control-claro form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"   required>

                @if ($errors->has('email'))
                <span class="invalid-feedback lead text-light" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>


        
 
         <div class="form-group form-inline align-items-end">
          <div class="icon-form">
            <i class="fal fa-id-card"></i>
          </div>

          <div class="form-group">
           <label class="bmd-label-floating"> CURP</label>


           {{Form::text('curp', old('curp'), ['class'=>'form-control'] )}}
         </div>
       </div>
       <div class="form-group form-inline align-items-end">
        <div class="icon-form">
          <i class="fal fa-birthday-cake"></i>
        </div>
        <div class="form-group">
          <label class="bmd-label-floating"> Fecha de cumpleaños</label>

          {{Form::text('birthdate', old('birthdate'), ['class'=>'form-control datepicker2 '] )}}
        </div>
      </div>
      <div class="form-group form-inline align-items-end">
        <div class="icon-form">
          <i class="fal fa-phone"></i>
        </div>


        <div class="form-group">
          <label class="bmd-label-floating"> Telefono</label>

          {{Form::number('telephone', old('telephone'), ['class'=>'form-control'] )}}
        </div>
      </div>

      <div class="form-group form-inline align-items-end">
        <div class="icon-form">
          <i class="fal fa-venus-mars"></i>
        </div>
                  <div class="form-group">
              
                  <select class="selectpicker" name="sex" id="sex" data-style="select-with-transition" title="Sexo" data-size="sd7">                  
                     <option value="f" <?php if(old('sex')=='f'){echo "selected";} ?>>Femenino</option>
                     <option value="m" <?php if(old('sex')=='m'){echo "selected";} ?>>Masculino</option>
                
                  </select>

      
            </div>

      </div>



      <div class="form-group form-inline align-items-end">
        <div class="icon-form">
          <i class="fal fa-home"></i>
        </div>


        <div class="form-group">
          <label class="bmd-label-floating">Direccion</label>

          {{Form::text('address',old('address'), ['class'=>'form-control'] )}}
        </div>
      </div>
      <div class="form-group form-inline align-items-end">
        <div class="icon-form">
          <i class="fal fa-envelope"></i>
        </div>

        <div class="form-group">
          <label class="bmd-label-floating"> Codigo postal</label>

          {{Form::number('postalCode', old('postalCode'), ['class'=>'form-control'] )}}
        </div>
      </div>
      <div class="form-group form-inline align-items-end">
        <div class="icon-form">
          <i class="fal fa-city"></i>
        </div>

        <div class="form-group">
          <label class="bmd-label-floating"> Ciudad</label>

          {{Form::text('city',old('city'), ['class'=>'form-control'] )}}
        </div>
      </div>
      <div class="form-group form-inline align-items-end">
        <div class="icon-form">
          <i class="fal fa-flag"></i>
        </div>

        <div class="form-group">
          <label class="bmd-label-floating"> Pais</label>

          {{Form::text('country', old('country'), ['class'=>'form-control'] )}}
        </div>
      </div>
     
          <div class="form-group form-inline justify-content-center ">
            

            
        


 

           <div class="fileinput fileinput-new text-center" data-provides="fileinput">
              <div class="fileinput-new thumbnail img-circle img-raised" style="height: 100px;width: 100px; overflow: hidden;">
              <img src="" class="img-height">
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised" style="height: 100px;width: 100px; overflow: hidden;"></div>
            <div>
              <span class="btn btn-raised btn-round btn-primary btn-file">
                <span class="fileinput-new">Agregar foto</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="image" value="old('imagen')" />
              </span>
              <br />
              <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
            </div>
          </div>
        </div>








          <div class="form-group form-inline align-items-end ">
            <div class="icon-form ">
              <i class="fas fa-key"></i>
            </div>


            <div class="form-group">
             <label class="bmd-label-floating"> Contraseña</label>

             <input id="password" type="password" class=" form-control-claro form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"   required>

             @if ($errors->has('password'))
             <span class="invalid-feedback lead text-light" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>

        </div>

        <div class="form-group form-inline align-items-end ">
          <div class="icon-form ">
            <i class="fas fa-key"></i>
          </div>



          <div class="form-group">
           <label class="bmd-label-floating"> Repetir contraseña</label>



           <input id="password-confirm" type="password" class=" form-control-claro form-control" name="password_confirmation"  required>

         </div>
       </div>


       <div class="mb-3 text-center">

        <button type="submit" onclick="" class="btn   btn-primary">
          {{ __('Registrarse') }}
        </button>
      </div>

    </form>

  </div>



</div>
</div>
</div>

</section>

</main>

@endsection
