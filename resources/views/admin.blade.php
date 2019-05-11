@extends('layouts.app')

@section('content')
<section class="container tarjeta">
    <div class="row justify-content-center">
        <div class="col-md-6 col-12 tarjeta-titulo">
            <h2 class="h2">¡Ups! </h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 tarjeta-contenido">
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="lead text-center text-light">
                        
                    Necesitas ser administrador para ver esta página. ¡Lo sentimos!
                    </p>
        </div>
    </div>
</section>
@endsection
