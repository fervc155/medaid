@if(count($errors) > 0)
@foreach($errors->all() as $error)


<script>
	swal("Error", "{{ $error }}", 'error');
</script>
@endforeach
@endif


@if(session('success'))
<script>
	swal("Bien", "{{ session('success') }}", 'success');
</script>
@endif

@if(session('error'))

<script>
	swal("Error", "{{ session('error') }}", 'error');
</script>

@endif