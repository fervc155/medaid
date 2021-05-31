@extends('layouts.web')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12  mt-5">
    </div>
    <div class="col-12">
      <div class="card">
       

        <div class="card-body">
         
         <div id="grafica-relacion-citas" style="height: 600px;">
          
         </div>

         
       </div>
     </div>
   </div>

 </div></div>

 @endsection


 @push('js')
 <script>

  $.ajax({
    url:'http://localhost/laravel/hospital/public/test',
    method:'GET',
    success:function(data){

      

      data = JSON.parse(data);

      label = [];

      for(let i=0; i<=100; i+=5){

        label.push(i);
      }
      series=[]
      data.forEach(function(json){

        var valores = []; 
        label.forEach(function(ee){ 
          
          valores.push( json[ee]);
        })


        series.push(valores)

      })



      console.log(series);


      dataChart=
      {
        labels:label,
        series
      }

      new Chartist.Line('#grafica-relacion-citas',dataChart,{

        low: 0,
        showArea: false,

        fullWidth: true

      });
    },
    error:function(a,b,c){
      console.log(a);
      console.log(b);
      console.log(c);

    }

  })

  
</script>

@endpush