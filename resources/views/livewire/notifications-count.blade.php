<div class="d-inline">

	@if($count>0)
	<span class=" btn-sm with-notification btn-just-icon btn-danger btn 
	btn-round">{{$count}}</span>

	@endif
</div>



<script>
	


	$(document).ready(function()
	{


		function reloadCount()
		{
			Livewire.emit('reloadCount');

		}




		setInterval(function(){ 
			reloadCount(); 
		}, 2000);


	});

</script>	