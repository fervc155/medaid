<div>

   <div id="grafica-ventas-mes"></div>
</div>


<script type="text/javascript">
		Livewire.on('bi_gain',function(dataset)
	{
		 

	 

		//grafica peores  medicos
		if ($('#grafica-ventas-mes').length>0)
		{

		 

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