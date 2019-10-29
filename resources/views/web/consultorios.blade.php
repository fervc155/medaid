@extends('layouts.web')

@section('content')



<div class="container">
  <div class="row">

    @foreach ($offices as $office)
    <div class="col-3">

      {{$office->name}}
    </div>

    @endforeach
  </div>
</div>



@endsection