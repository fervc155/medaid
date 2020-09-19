@foreach ($users as $user)
<div class="card   my-5">
  <div class="card-encabezado">

    <div class="card-cabecera-icono bg-info sombra-2 ">

      <i class="fal fa-user"></i>
    </div>
    <div class="card-title">{{$user->name}}</div>
  </div>

  <div class="card-body">






    <div class="form-inline mb-2">
      <div class="icon-form">
        <i class="fas fa-card-id"></i>
      </div>

      <div class="icon-texto">

        <span class="color-principal">Id: </span> {{ $user->id }}
      </div>

    </div>




    <div class="form-inline mb-2">
      <div class="icon-form">
        <i class="fas fa-card-id"></i>
      </div>

      <div class="icon-texto">

        <span class="color-principal">Mail: </span> {{ $user->email }}
      </div>

    </div>


    <div class="form-inline mb-2">
      <div class="icon-form">
        <i class="fas fa-card-id"></i>
      </div>

      <div class="icon-texto">

        <span class="color-principal">Privilegio: </span> {{ $user->NamePrivilege }}
      </div>

    </div>


    <div class="form-inline mb-2">
      <div class="icon-form">
        <i class="fas fa-card-id"></i>
      </div>

      <div class="icon-texto">

        <span class="color-principal">Id usuario: </span> {{ $user->Id_user }}
      </div>

    </div>





    <div class="text-center">
      <a href="" class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-user-injured"></i></a>

      <a href="" class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

      <button class="btn btn-danger btn-round btn-just-icon btn-sm btn-confirm-delete" id="paciente"> <i class="fas fa-times"></i></button>

    </div>

  </div>

</div>

@endforeach