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
              {{__('Por favor confirma tu contraseña antes de continuar')}}
            </div>
          </div>

          <div class="card-body">
       <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
          </div>



        </div>
      </div>
    </div>

    </section>

</main>

@endsection