@extends('layouts.app')

@section('content')
<section class="container tarjeta">

    <div class="row justify-content-center">
        <div class="col-12 col-md-6 tarjeta-titulo">
            <h2 class="h2">{{ __('Restablecer contraseña') }}</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-6 tarjeta-contenido ">
            
   
                   @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group form-inline justify-content-center">

                            <div class="icon-form ">
                                <i class="fas fa-at"></i>
                            </div>

                       
                                <input id="email" type="email" class="form-control-claro form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('Correo electrónico')}}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group form-inline justify-content-end mb-0">
                                <button type="submit" class="btn btn-primary btn-claro">
                                    {{ __('Enviar enlace de recuperación') }}
                                </button>
                            </div>
                    </form>
             
        </div>
    </div>
</section>
@endsection
