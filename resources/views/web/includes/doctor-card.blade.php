 <div class="card card-profile">

  <div class="card-header card-header-image">
      <!-- <img class="img img-height" src="https://lorempixel.com/640/360/people"> -->
      <img class="img img-height" src="{{asset($doctor->Profileimg)}}">
  </div>
  <div class="card-body ">
    <h6 class="card-category mt-4 text-gray"><i class="fal fa-file-certificate"></i>{{$doctor->speciality->name}} {{$doctor->speciality->price}}/consulta</h6>
    <h4 class="card-title"> {{$doctor->name}}</h4>
    <p class="card-description">
<div class="stars">
                        <?php $estrellas = round($doctor->stars);
                              $noEstrellas = 5-$estrellas; ?>
                         
                        @for($i = 0;$i<$estrellas ; $i++)
                        <i class="fas fa-star"></i>
                        @endfor
                         @for($i = 0;$i<$noEstrellas ; $i++)
                        <i class="fal fa-star"></i>
                        @endfor
                      </div>
                      <div>
                        {{$doctor->stars}}
                      </div>
                      
    </p>
    <a href="{{url('visitante/doctor/'.$doctor->id)}}" class="btn btn-info btn-round"><i class="fal fa-calendar-check"></i> Ver Calendario</a>
  </div>
</div>