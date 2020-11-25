<div>
	<div id="grafica-peores-medicos"></div>

</div>


<script type="text/javascript">
 

	function orderAsc(dataset)
	{

		for(i=0; i< dataset[0].length;i++)
		{

			for (var j = 0; j <dataset[0].length  ;j++) 
			{
				if(dataset[0][i]<dataset[0][j])
				{
					temp = dataset[0][i];
					dataset[0][i]= dataset[0][j];
					dataset[0][j]=temp;

						temp = dataset[1][i];
					dataset[1][i]= dataset[1][j];
					dataset[1][j]=temp;
				}
			}
		}

		return dataset;
	}
	Livewire.on('bi_doctor',function(dataset)
	{
		dataset =orderAsc(dataset);
 

		//grafica peores  medicos
		if ($('#grafica-peores-medicos').length>0)
		{


			data=
			{
				labels: dataset[1].slice(0,5),
				series: [
				dataset[0].slice(0,5),    ]
			}

			new Chartist.Bar('#grafica-peores-medicos',data,{

				low: 0,
				showArea: true,

				fullWidth: true

			});

		}

	})
</script>
