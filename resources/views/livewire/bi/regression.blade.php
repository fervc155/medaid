<div>

	<h4>Ganancias estimadas del proximo mes <span class="d-block font-weight-bold" id="regression-gain"></span></h4>

	   <div id="grafica-regresion"></div>

</div>


<script>
	
	$(document).ready(function()
	{

		Livewire.on('bi_regression',function(data)
		{


			$('#regression-gain').html('MXN$ '+data[2].toFixed(2));
  

	 

		//grafica peores  medicos
		if ($('#grafica-regresion').length>0)
		{

		 

			data=
			{
				labels:['ENE','FEB','MAR','ABR','MAY','JUN',
				'JUL','AGO','SEP','OCT','NOV','DIC'],
				series: [data[1],    ]
			}

			new Chartist.Line('#grafica-regresion',data,{

				low: 0,
				showArea: false,

				fullWidth: true

			});

		}

	})

 
	})
</script>