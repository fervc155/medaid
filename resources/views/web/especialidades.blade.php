@extends('layouts.web')

@section('content')



<div class="container">
  <div class="row justify-content-center">
      
  @foreach($specialities as $speciality)
        @if(count($speciality->doctors)>0)
    <div class="col-12 col-md-4 col-xl-3">
      <div class="card card-pricing">
                  <div class="card-body ">
                                        <h6 class="card-category text-gray"> 
                                            <i class="fal fa-user-md"></i> {{count($speciality->doctors)}} Doctores</h6>

                    <div class="icon icon-info">
                      <i class="fal fa-file-certificate"></i>
                    </div>
                    <h3 class="card-title">{{$speciality->price}}/<small>consulta</small></h3>
                    <p class="card-description">
                      <span class="text-uppercase text-primary">

                    {{$speciality->name}}
                        
                      </span>
                      <div class="stars">
                        <?php $estrellas = round($speciality->stars);
                              $noEstrellas = 5-$estrellas; ?>
                         
                        @for($i = 0;$i<$estrellas ; $i++)
                        <i class="fas fa-star"></i>
                        @endfor
                         @for($i = 0;$i<$noEstrellas ; $i++)
                        <i class="fal fa-star"></i>
                        @endfor
                      </div>
                      <div>
                        {{$speciality->stars}}
                      </div>
                    </p>
                    <a href="{{url('/visitante/especialidad/'.$speciality->id)}}" class="btn btn-info btn-round">Ver doctores</a>
                  </div>
                </div>
         

      
       
                </div>

          
          @endif
  @endforeach
</div>

</div>




@endsection