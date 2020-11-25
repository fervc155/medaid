<div>
	<div id="grafica-mejores-medicos"></div>

</div>


<script type="text/javascript">
 

	function orderDesc(dataset)
	{

		for(i=0; i< dataset[0].length;i++)
		{

			for (var j = 0; j <dataset[0].length  ;j++) 
			{
				if(dataset[0][i]>dataset[0][j])
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
		dataset =orderDesc(dataset);
 

		//grafica mejores  medicos
		if ($('#grafica-mejores-medicos').length>0)
		{


			data=
			{
				labels: dataset[1].slice(0,5),
				series: [
				dataset[0].slice(0,5),    ]
			}

			new Chartist.Bar('#grafica-mejores-medicos',data,{

				low: 0,
				showArea: true,

				fullWidth: true

			});

		}

	})
</script>
