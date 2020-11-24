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
            @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
            @endif
              <form method="POST" class="formulario" action="{{ route('password.email') }}">
                @csrf
                <p>
                  Escribe tu correo electronico para que enviemos un enlace donde podrás recuperar tu contraseña
                </p>

                <div class="form-group form-inline align-items-end">
                  <div class="icon-form">
                    <i class="fas fa-envelope"></i>
                  </div>
                  <div class="form-group">
                    <label class="bmd-label-floating"> Email</label>
                    <input id="email" type="email" class="form-control-claro form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="mb-3 text-center">

                  <button type="submit" onclick="" class="btn   btn-primary">
                    {{ __('Recuperar mi contraseña') }}
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