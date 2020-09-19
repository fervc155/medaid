class Grafica
{


	constructor()
	{
		this.CrearGraficaCantidadCitas()
		this.CrearGraficaVentasMes();
		this.CrearGraficaCantidadCitas();
		this.CrearGraficaRelacionCitas();
		this.CrearGraficaMejoresMedicos();
		this.CrearGraficaPeoresMedicos();

		
	}


	CrearGraficaCantidadCitas()
	{



		if ($('#grafica-cantidad-citas').length>0)
		{

			 new Chartist.Line('#grafica-cantidad-citas', {
				labels: ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC'],
				series: [
				[12, 9, 7, 8, 5,5,32,54,65,32,43,45],    ]
			},{

				low: 0,
				showArea: true,

				fullWidth: true

			});
		}
	}


	CrearGraficaVentasMes()
	{


		if ($('#grafica-ventas-mes').length>0)
		{


			 new Chartist.Line('#grafica-ventas-mes', {
				labels: ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC'],
				series: [
				[12, 9, 7, 8, 5,5,32,54,65,32,43,45],    ]
			},{

				low: 0,
				showArea: true,

				fullWidth: true

			});

		}
	}



	CrearGraficaRelacionCitas()
	{


		//grarfica relacion citas
		if ($('#grafica-relacion-citas').length>0)
		{


			var data = {
				series: [5, 3, 4]
			};


			var sum = function(a, b) { return a + b };

			 new Chartist.Pie('#grafica-relacion-citas', data, {
				labelInterpolationFnc: function(value) {
					return Math.round(value / data.series.reduce(sum) * 100) + '%';
				}
			});
		}
	}




	CrearGraficaPeoresMedicos()
	{

		//grafica peores  medicos
		if ($('#grafica-peores-medicos').length>0)
		{


					new Chartist.Bar('#grafica-peores-medicos', {
				labels: ['doctor1','doctor2','doctor2','doctor2','doctor2'],
				series: [
				[12, 9, 7, 8, 5],    ]
			},{

				low: 0,
				showArea: true,

				fullWidth: true

			});
			var data = {
				series: [5, 3, 4]
			};

		}

	}



	CrearGraficaMejoresMedicos()
	{

		//grafica mejores  medicos
		if ($('#grafica-mejores-medicos').length>0)
		{


			 new Chartist.Bar('#grafica-mejores-medicos', {
				labels: ['doctor1','doctor2','doctor2','doctor2','doctor2'],
				series: [
				[123, 93, 73, 38, 35],    ]
			},{

				low: 0,
				showArea: true,

				fullWidth: true

			});
			var data = {
				series: [5, 3, 4]
			};

		}
	}
	///



	CrearGraficaCantidadCitas()
	{


		if ($('#grafica-cantidad-citas').length>0)
		{


			 new Chartist.Bar('#grafica-cantidad-citas', {
				labels: ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC'],
				series: [
				[12, 9, 7, 8, 5,5,32,54,65,32,43,45],    ]
			},{

				low: 0,
				showArea: true,

				fullWidth: true

			});

		}
	}

}
