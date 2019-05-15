<script src="{{asset('splash/vendor/sweetalert/sweetalert.js')}}"></script>

@if(count($errors) > 0)
	@foreach($errors->all() as $error)
			

			<script >
					
				swal("Error","{{ $error }}", 'error');
				
			</script>
	@endforeach
@endif

@if(session('success'))

			<script >
					
				swal("{{ $success }}","Bien", 'success');
				
			</script>
@endif

@if(session('error'))
	
			<script >
					
				swal("{{ $error }}","No puedes Iniciar Sesion", 'error');
				
			</script>

@endif