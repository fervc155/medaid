@extends('layouts.nav-login')

@section('content')
<section class="container tarjeta">

    <div class="row justify-content-center">
        <div class="col-12 col-md-6 tarjeta-titul">
            <h2 class="h2 m-0">{{ __('Restablecer contraseña') }}</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 col-12 tarjeta-contenido">

         @extends('layouts.nav-login')

@section('content')

<main class="login" style="background-image: url({{asset('splash/header/login.jpg')}});">
  <!-- <main class="login"> -->

  <secton class="container mt-5 ">
    <div class="row  justify-content-center">
      <div class="col-11 col-sm-8 col-md-6 col-lg-5 col-xl-4">





        <div class="card card-blog sombra">
          <div class="card-cabecera bg-info sombra-2">

            <div class="card-title text-center">
              {{__('Reestablecer contraseña')}}
            </div>
          </div>

          <div class="card-body">
             <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">

                    <p>Escribe tu correo electronico y una nueva contraseña</p>
                 
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" placeholder="{{ __('Correo electrónico') }}" required autofocus>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">

                  

                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contraseña') }}" name="password" required>

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
               



                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirmar contraseña') }}" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn  btn-primary">
                        {{ __('Aceptar') }}
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
        </div>
</section>
@endsection