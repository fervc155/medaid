@extends('layouts.app')

@section('content')
<section class="container tarjeta">


    <div class="row justify-content-center ">
        <div class=" text-center tarjeta-titulo col-12 col-md-6  ">
            <h2 class="h2 py-3 m-0">
                {{__('Registro')}}
                
            </h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="tarjeta-contenido col-md-6 col-12 ">

               
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group form-inline justity-content-center ">
                            <div class="icon-form ">
                                <i class="fas fa-user"></i>
                            </div>
                            
                                <input id="name" type="text" class=" form-control-claro form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="{{ __('Nombre') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback lead text-light" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group form-inline justity-content-center ">
                            <div class="icon-form ">
                                <i class="fas fa-at"></i>
                            </div>

                                <input id="email" type="email" class=" form-control-claro form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  placeholder="{{ __('Correo electrónico') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback lead text-light" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group form-inline justity-content-center ">
                            <div class="icon-form ">
                                <i class="fas fa-key"></i>
                            </div>
                              <input id="password" type="password" class=" form-control-claro form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contraseña') }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback lead text-light" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        
                        </div>

                        <div class="form-group form-inline justity-content-center ">
                            <div class="icon-form ">
                                <i class="fas fa-key"></i>
                            </div>

                                <input id="password-confirm" type="password" class=" form-control-claro form-control" name="password_confirmation" placeholder="{{ __('Confirmar contraseña') }}" required>
                      
                        </div>

                        <div class="form-group form-inline justity-content-center  mt-4 mb-0">
                  
                                <button type="submit" class="btn w-100 btn-claro">
                                    {{ __('Registrar') }}
                                </button>
                          
                        </div>
                    </form>
              
        </div>
    </div>
</section>
@endsection
