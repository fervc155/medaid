@extends('layouts.nav-admin')


@section('content')

<div class="container-fluid   chat-contenedor">
  <div class="row h-100">
    <div class="col-12 col-sm-4 h-100 p-0">
      

      <ul class="chat-list">

        <div class="input-group chat-search">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fas fa-search"></i>
            </span>
          </div>
          <input type="text" class="form-control" placeholder="Buscar un chat">
        </div>  
        @for ($i=0 ; $i<50 ; $i++)
        <li class="chat-item ">
          <div class="imagen-chat">
            <img src="{{asset('splash/img/user-default.jpg')}}">
            
          </div>
          <div class="texto">
            
            <span class="nombre">Nombre</span>
            <span class="fecha ">12/12/1212</span>
            <div class="mensaje">lorem ipsum dolor...</div>
          </div>
        </li>
        @endfor
      </ul>

    </div>
    <div class="col-12 col-sm-8 h-100 p-0">
    	<div class="chat-individual">
    		<div class="chat-cabecera">
    			<span class="nombre">Nombre </span>
    			<span class="estado">Activo</span>
    		</div>

    		<div class="chat-contenido">
    			
    				<div class="mensaje-entrada"><span class="mensaje">primer hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>

    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>

    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">hola</span></div>
    				<div class="mensaje-entrada"><span class="mensaje">hola</span></div>
    				<div class="mensaje-salida"><span class="mensaje">ultimo hola</span></div>
    				
    		</div>

    		<div class="chat-entrada">
    			<div class="input-mensaje">
    				
    			<input type="text" class="form-control" placeholder="Mensaje" name="">
    			</div>
    			<div class="boton-mensaje">
    				<i class="fal fa-paper-plane"></i>
    			</div>
    			
    		</div>
    	</div>
      
    </div>
  </div>
</div>

@endsection