<div>
	<div id="grafica-cantidad-citas"></div>
</div>


<script type="text/javascript">
	


	Livewire.on('bi_reload_quantity',function(dataset)
	{

		data ={
			labels: dataset[1],
			series: dataset[0]
		}

		new Chartist.Bar('#grafica-cantidad-citas', data, {
  distributeSeries: true
});

	});

	 
</script>