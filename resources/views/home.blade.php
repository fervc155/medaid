@extends('layouts.app')

@section('content')
<div class="container tarjeta">
    <div class="row justify-content-center">
        <div class="col-md-6 col-12 tarjeta-titulo">
            <h2 class="h2 ">Dashboard</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        
        <div class="col-12 col-md-6 tarjeta-contenido ">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="text-light lead text-center">
            Iniciaste sesión sin problemas!
                
            </div>

        </div>
    </div>
</div>
@endsection
