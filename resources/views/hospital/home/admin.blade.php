@extends('layouts.nav-admin')

@section('content')

<div class="container">

  <div class="row">
    <div class="col-6">

			  @include('hospital.includes.tableUser',['compact'=>true])

      </div>

      <div class="col-6">
      	  @include('hospital.includes.tablePayment', ['compact'=>true]);

      </div>

    </div>





  </div>
</div>
@endsection