@extends('layouts.nav-login')

@section('content')

<main class="register" style="background-image: url({{asset('splash/header/login.jpg')}});">

  <secton class="container mt-5 ">
    <div class="row  justify-content-center">
      <div class="col-11 col-sm-8 col-md-6 col-lg-5 col-xl-4"> 

        



        <div class="card card-blog sombra">
          <div class="card-cabecera bg-info sombra-2">

            <div class="card-title text-center">
              {{__('Registro')}}
            </div>
          </div>

          <div class="card-body">
            <form method="POST" class="formulario" action="{{ route('register') }}">
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
