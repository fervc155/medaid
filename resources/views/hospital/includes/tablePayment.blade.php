 

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

        <div class="card-body table-responsives">
      <a href="{{route('billingPortal')}}" class="btn btn-primary btn-block my-4" target="_blank">Ver Portal del comprador en STRIPE</a>

          <table class="table" id="data_table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Cita ID</th>
                <th>Fecha de pago</th>
                <th>Metodo de pago</th>
                <th>Cantidad        </th>
                <th>Descripcion</th>
               
              
              </tr>
            </thead>
            <tbody>
                 @foreach($payments as $payment)

      <tr>
        <td>
          {{$payment->id}}
        </td>
        <td>
          <a href="{{$payment->appointment->profileUrl}}">Ver cita </a>
        </td>
        <td>
          {{$payment->created_at->diffForHumans()}}
        </td>
        <td>
          @if($payment->online)
          Tarjeta
          @else 
          efectivo
          @endif
        </td>
        <td>
          {{$payment->cost}}

            @if(null!= $payment->invoice)

          <a class="btn btn-secondary" href="{{route('invoice.download', ['payment'=>$payment->id])}}" target="_blank">Descargar factura</a>
           

          @endif
        </td>

        <td>
          {{$payment->description}}
        </td>
  


      </tr>
      @endforeach
            </tbody>
          </table>

        </div>
      </div>

    </div>



 
  </div>
</div>