 

<div class="container">

  <div class="row">
    <div class="col-12 d-none d-md-block">
      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-envelope-open-text"></i>
          </div>
          <div class="card-title">Listado de pagos</div>
        </div>

               
        <div class="card-body table-responsive">
 @if(!isset($compact))
      <a href="{{route('billingPortal')}}" class="btn btn-primary btn-block my-4" target="_blank">Ver Portal del comprador en STRIPE</a>
@endif
          <table class="table" id="data_table">
            <thead>
              <tr>

                 @if(!isset($compact))
               
                <th>ID</th>
               @endif
                <th>Cita ID</th>
                <th>Fecha de pago</th>
                 @if(!isset($compact))
               
                <th>Metodo de pago</th>
               @endif
                <th>Cantidad        </th>
                 @if(!isset($compact))
               
                <th>Descripcion</th>
               @endif
              
              </tr>
            </thead>
            <tbody>
                 @foreach($payments as $payment)

      <tr>
         @if(!isset($compact))
               
        <td>
          {{$payment->id}}
        </td>
        @endif
        <td>
          <a href="{{$payment->appointment->profileUrl}}">Ver cita </a>
        </td>
        <td>
          {{$payment->created_at->diffForHumans()}}
        </td>

         @if(!isset($compact))
               
        <td>
          @if($payment->online)
          Tarjeta
          @else 
          efectivo
          @endif
        </td>
        @endif
        <td>
          {{$payment->cost}}

            @if(null!= $payment->invoice)

          <a class="btn btn-secondary" href="{{route('invoice.download', ['payment'=>$payment->id])}}" target="_blank">Descargar factura</a>
           

          @endif
        </td>

         @if(!isset($compact))
               

        <td>
          {{$payment->description}}
        </td>
        @endif
  


      </tr>
      @endforeach
            </tbody>
          </table>

        </div>
      </div>

    </div>



 
  </div>
</div>