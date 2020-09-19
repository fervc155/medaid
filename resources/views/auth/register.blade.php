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

              @include('forms.create.user')

              <div class="form-group form-inline align-items-end">
                <div class="icon-form">
                  <i class="fal fa-id-card"></i>
                </div>

                <div class="form-group">
                  <label class="bmd-label-floating"> CURP</label>


                  {{Form::text('curp', old('curp'), ['class'=>'form-control'] )}}
                </div>
              </div>

              @include('forms.create.address')













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