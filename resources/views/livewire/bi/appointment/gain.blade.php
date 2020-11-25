<div>

   <div id="grafica-ventas-mes"></div>
</div>


<script type="text/javascript">
		Livewire.on('bi_gain',function(dataset)
	{
		 

		 console.log('cargado');
 

		//grafica peores  medicos
		if ($('#grafica-ventas-mes').length>0)
		{

			console.log(dataset);


			data=
			{
				labels:['ENE','FEB','MAR','ABR','MAY','JUN',
				'JUL','AGO','SEP','OCT','NOV','DIC'],
				series: [dataset,    ]
			}

			new Chartist.Line('#grafica-ventas-mes',data,{

				low: 0,
				showArea: true,

				fullWidth: true

			});

		}

	})
</script>