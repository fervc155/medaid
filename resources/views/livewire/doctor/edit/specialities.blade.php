<div class="table-responsive">


 
  <table class="table">
    <thead>
      <tr>
        <th>
          Nombre
        </th>
        <th>
          Costo
        </th>
        <th>
          Opciones
        </th>
      </tr>
    </thead>
    <tbody>
      
    
  @foreach($doctor_specialities as $relation)

  <tr>
    
    
    <td>
      
      {{$relation->speciality->name}}
    </td>
    <td>
      <input type="text"  class="form-control  {{$relation->id}}" value="{{$relation->cost}}">
    </td>
    <td>
      <button class="btn btn-secondary btn-sm" onclick="actualizar({{$relation->id}})">Guardar</button>
      <button class="btn  btn-danger btn-sm" wire:click="eliminar({{$relation->id}})">Eliminar</button>
    </td>
  
  </tr>
  @endforeach
  
    </tbody>
  </table>




  <h3>Agregar nueva</h3>
  <table class="table">
   
    <tbody>
      
    

  <tr>
    
    
    <td>
      <select wire:model="selected_speciality"  class="form-control">
        <option>Selecciona una especialidad</option>
          @foreach($specialities as $speciality)
                <option value="{{$speciality->id}}">
                  
                    {{$speciality->name}}
                </option>
          @endforeach
      </select>
    </td>
    <td>
      <input type="text"   wire:model="cost" class="form-control" value="0">
    </td>
    <td>
      <button class="btn btn-secondary btn-sm" wire:click="new_speciality()">Guardar</button>
      
    </td>
  
  </tr>
  
    </tbody>
  </table>




</div>





@push('js')


<script>


  let actualizar = function(id){

      let val =$(`input.${id}`).val();
      Livewire.emit('update',[
          id,val

        ])
  }
  
  Livewire.on('success',function(message){
    swal('Completado',message,'success');
    Livewire.emit('render');
  })
   Livewire.on('error',function(message){
    swal('Error',message,'error')
  })

</script>


@endpush
