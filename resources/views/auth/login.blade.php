@extends('layouts.app')

@section('content')
<secton class="container tarjeta ">
    <div class="row justify-content-center ">
        <div class=" text-center tarjeta-titulo col-12 col-md-6  ">
            <h2 class="h2 py-3 m-0">
                {{__('Iniciar Sesion')}}
                
            </h2>
        </div>
    </div>
    <div class="row  justify-content-center">


        <div class="tarjeta-contenido col-md-6 col-12">
               
            <form method="POST"  action="{{ route('login') }}" >
                @csrf

                <div class="form-group form-inline tarjeta-formulario justify-content-center">
                
                    <div class="icon-form">
                        <i class="fas fa-at"></i>
                    </div>

                        <input id="email" type="email" class="form-control-claro form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Correo Electronico')}}">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback text-light" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                   
                </div>

                <div class="form-group form-inline tarjeta-formulario justify-content-center">
                    <div class="icon-form ">
                       <i class="fas fa-key"></i>
                    </div>
                    
                        <input id="password" type="password" class="form-control-claro form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{__('Clave')}}">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback text-light" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                </div>
            
                <div class="my-5">
                    
                    <button type="submit" onclick="esperar()" class="btn  w-100 btn-claro">
                        {{ __('Entrar') }}
                    </button>
                </div>
                    
                <div class="form-group  form-inline justify-content-between">
                   
                            
            
     
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label  link-blanco lead" for="remember">
                            {{ __('Recordarme') }}
                        </label>
                    </div>
             

                <div class="form-inline justify-content-end">
                    <a class="link-blanco  lead" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                </div>
                </div>
            </form>
            
        </div>
    </div>
</section>
@endsection
