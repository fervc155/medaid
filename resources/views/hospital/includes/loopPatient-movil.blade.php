
      @foreach ($patients as $patient)
      <div class="card   my-5">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-user-injured"></i>
          </div>
          <div class="card-title">{{$patient->name}}</div>
        </div>
        
        <div class="card-body">
          
          

          <div class="form-inline mb-2">
            
            
            <div class="icon-form">
              
              <i class="fas fa-id-card"></i> 
            </div>  
            <div class="icon-texto">
              <span class="color-principal">CURP </span> {{ $patient->curp }}
            </div>
          </div>



          <div class="form-inline mb-2">
            <div class="icon-form">
              <i class="fas fa-phone"></i>
            </div>

            <div class="icon-texto">
              
              <span class="color-principal">Telefono </span> {{ $patient->telephoneNumber }}
            </div>
            
          </div>


          <div class="form-inline mb-2">
            <div class="icon-form">
              <i class="fas fa-venus-mars"></i>
            </div>

            <div class="icon-texto">
              
              <span class="color-principal">Sexo </span> {{ $patient->sex }}
            </div>
            
          </div>


          <div class="form-inline mb-2">
            <div class="icon-form">
              <i class="fas fa-home"></i>
            </div>

            <div class="icon-texto">
              
              <span class="color-principal">Domicilio </span> {{ $patient->address }}
            </div>
            
          </div>  

          <div class="form-inline mb-2">
            <div class="icon-form">
              <i class="fas fa-user-md"></i>
            </div>

            <div class="icon-texto">
              
              <a href="/doctor/{{$patient->doctor->id}}" class="link"><span class="color-principal">Medico </span> {{ $patient->doctor->name }}</a>
            </div>
            
          </div>
          <div class="text-center">
            <a href="{{url('/patient/'.$patient->dni)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-user-injured"></i></a>

            <a href="{{url('/patient/'.$patient->dni).'/edit'}}"  class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

            <button class="btn btn-danger btn-round btn-just-icon btn-sm btn-confirm-delete" id="paciente-{{$patient->dni}}"> <i class="fas fa-times"></i></button>

            {!! Form::open(['action' => ['PatientController@destroy', $patient->dni], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Eliminar', ['class' => 'btn-delete d-none ','id'=>'patient-'.$patient->dni]) }}
            {!! Form::close() !!}

          </div>
        </div>
        
      </div>

      @endforeach
      