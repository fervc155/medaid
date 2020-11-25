<div>
	<div id="grafica-relacion-citas"></div>
</div>




<script type="text/javascript">
	


	Livewire.on('bi_reload_circle',function(dataset)
	{



		//grarfica relacion citas
		if ($('#grafica-relacion-citas').length>0)
		{


			var data = {
				series: dataset[0],
				labels: dataset[1],
			};

	 

			var options = {
				labelInterpolationFnc: function(value) {
					return value[0]
				}
			};

			var responsiveOptions = [
			['screen and (min-width: 640px)', {
				chartPadding: 3,
				labelOffset: 1,
				labelDirection: 'explode',
				labelInterpolationFnc: function(value) {
					return value;
				}
			}],
			['screen and (min-width: 1024px)', {
				labelOffset: 8,
				chartPadding: 2
			}]
			];

			new Chartist.Pie('#grafica-relacion-citas', data, options, responsiveOptions);

		}


	})


</script>
