@extends('layouts.web')

@section('content')






<div class="container mt-5">

  <div class="row ">


    <div class=" col-12 col-md-4">



      <div class="card ">
        <img src="{{asset($office->Profileimg)}}" class="img-fluid">

        <h5 class="h4 text-light bg-secondary text-center text-capitalize mt-0 p-3"> {{$office->name}}</h5>


        <div class="card-body">






          <div class="form-inline mb-2">


            <div class="color-principal">

              <i class="fal fa-address-card"></i> ID:
            </div>

            {{ $office->id }}

          </div>
          <div class="form-inline mb-2">


            <div class="color-principal">

              <i class="fal fa-home"></i> Domicilio:
            </div>

            {{ $office->address }}

          </div>


          <div class="form-inline mb-2">
            <div class="color-principal">
              <i class="fal fa-envelope"></i> CP:
            </div>

            {{ $office->postalCode }}

          </div>
          <div class="form-inline mb-2">
            <div class="color-principal">
              <i class="fal fa-city"></i> Ciudad:
            </div>
            {{ $office->city }}

          </div>



          <div class="form-inline mb-3">
            <div class="color-principal">
              <i class="fal fa-flag"></i> Pais:
            </div>
            {{ $office->country }}

          </div>

        </div>

      </div>


    </div>

    <div class=" col-12 col-md-8 ">



      <div class=" row  text-center contadores">
        <div class="col-12 col-md-6">

          <div class="caja-contador card">

            <?php $i = 0;

            foreach ($doctors as $d) {
              $i++;
            }

            ?>
            <div class="caja-contador-icono">

              <i class="fal fa-user-md"></i>
            </div>
            <div class="card-body">


              <h3>{{$i}}</h3>
              <p>Doctores</p>
            </div>
          </div>


        </div>
        <div class="col-12 col-md-6">

          <div class="caja-contador card">

            <?php $i = 0;

            foreach ($doctors as $d) {
              $i += count($d->appointments);
            }

            ?>
            <div class="caja-contador-icono">

              <i class="fal fa-calendar-check"></i>
            </div>
            <div class="card-body">


              <h3>{{$i}}</h3>
              <p>Citas</p>
            </div>
          </div>


        </div>




      </div>

      <div class="row">
        <div class="col">
          {!! $office->map!!}
        </div>
      </div>







    </div>
  </div>


</div>



<div class="container">
  <h2>
    Nuestros Doctores
  </h2>

  <div class="row">



    <div class="col-lg-5 col-md-6 col-sm-12">

      <p class="text-capitalize"> filtrar por especialidad
      </p> <select id="select-especialidad" class="selectpicker" data-style="select-with-transition" title="Especialidad" data-size="sd7">
        @foreach($specialities as $speciality)


        <option value="{{str_replace(' ','-',$speciality)}}">{{$speciality}}</option>

        @endforeach
        <option value="Todos">Todos</option>


      </select>
    </div>


  </div>

</div>

<main class="container py-5">

  <div class="row">

    @foreach($doctors as $doctor)

    <div class="col-sm-6 col-md-4  card-doctor <?php foreach ($doctor->specialities as $speciality) {
                                                  echo " " . str_replace(' ', '-', $speciality->name);
                                                } ?>">

      @include('web.includes.doctor-card')

    </div>
    @endforeach

  </div>
</main>


@endsection

@include('includes.dataTables')