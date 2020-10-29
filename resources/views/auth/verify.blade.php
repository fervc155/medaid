 
<main class="login" style="background-image: url({{asset('splash/header/login.jpg')}});">
    <!-- <main class="login"> -->

        <secton class="container mt-5 ">
            <div class="row  justify-content-center">
                <div class="col-11 col-sm-8 col-md-6  ">





                 <div class="card card-blog sombra">
                    <div class="card-cabecera bg-info sombra-2">
                        <div class="card-title text-center">{{ __('Verify Your Email Address') }}</div></div>

                        <div class="card-body">
                            @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }}


                            <div class="text-center">

                            <form action="{{ route('verification.resend') }}" method="post">@csrf<button class="btn btn-link d-inline">{{ __('click here to request another') }}</button></form>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                @csrf

                                <button  class="btn btn-primary"  > <i class="fal icon fa-sign-out-alt"></i> {{__('Cerrar sesión') }}</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

</main>

