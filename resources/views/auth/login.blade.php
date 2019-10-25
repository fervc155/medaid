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
								{{__('Iniciar sesion')}}
							</div>
						</div>

						<div class="card-body">
							<form class="formulario" method="POST"  action="{{ route('login') }}" >
								@csrf

								<div class="form-group form-inline align-items-end">
									<div class="icon-form">
										<i class="fas fa-at"></i>
									</div>
									<div class="form-group">
										<label class="bmd-label-floating"> Email</label>
										<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

										@if ($errors->has('email'))
										<span class="invalid-feedback text-light" role="alert">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
										@endif                                
									</div>
								</div>

								<div class="form-group form-inline align-items-end">
									<div class="icon-form">
										<i class="fas fa-key"></i>
									</div>
									<div class="form-group">
										<label class="bmd-label-floating"> Password</label>
										<input id="password" type="password" class="form-control-claro form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

										@if ($errors->has('password'))
										<span class="invalid-feedback text-light" role="alert">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
										@endif                               
									</div>
								</div>

								<div class="mb-3 text-center">

									<button type="submit" onclick="" class="btn   btn-primary">
										{{ __('Entrar') }}
									</button>
								</div>


								
								 <div class="form-check float-left">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember"  id="remember">
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                       {{ __('Recordarme') }}
                      </label>
                    </div>
               
                    	

								<a  href="{{ route('password.request') }}" class="btn pr-0 btn-link float-right">
									{{ __('¿Olvidaste tu contraseña?') }}
								</a>
                
							</form>
						</div>



					</div>
				</div>
			</div>

		</section>

	</main>

	@endsection



