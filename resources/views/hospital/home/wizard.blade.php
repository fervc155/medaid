@extends('layouts.nav-wizard')

@section('content')

<div class="container h-100">



		@livewire('wizard.home')

		@livewire('wizard.ask')


		@livewire('wizard.response')




  </div>
</div>
@endsection