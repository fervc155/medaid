@extends('layouts.app')

@section('content')
<section class="container tarjeta">

    <div class="row justify-content-center">
        <div class="col-12 col-md-6 tarjeta-titul">
            <h2 class="h2 m-0">{{ __('Restablecer contraseña') }}</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 col-12 tarjeta-contenido">

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group form-inline justify-content-center">

                    <div class="icon-form">
                        <i class="fas fa-at"></i>
                    </div>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" placeholder="{{ __('Correo electrónico') }}" required autofocus>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group form-inline justify-content-center">

                    <div class="icon-form">
                        <i class="fas fa-key"></i>
                    </div>


                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contraseña') }}" name="password" required>

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group form-inline justify-content-center">
                    <div class="icon-form">
                        <i class="fas fa-key"></i>
                    </div>




                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirmar contraseña') }}" required>
                </div>

                <div class="form-group form-inline justify-content-end mb-0">
                    <button type="submit" class="btn btn-claro btn-primary">
                        {{ __('Aceptar') }}
                    </button>
                </div>
            </form>

        </div>
</section>
@endsection