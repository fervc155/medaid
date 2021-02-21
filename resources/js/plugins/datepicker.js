

if (document.getElementsByClassName('datepicker2'))
{
	var Fecha = new Date();



	$('.datepicker2').pickadate({
		today: 'Hoy',
		clear: 'Limpiar',
		close: 'Cerrar',
		format: 'yyyy-mm-dd',
		selectMonths: true,
		selectYears: 100,


		max: new Date( Fecha.getFullYear()-18,  Fecha.getMonth(),Fecha.getDate() )
	});

}

if (document.getElementsByClassName('timepicker'))
{


	$('.timepickerEntrada').pickatime({
		min: [9,0],
		max: [16-4,0],
		clear: 'Quitar Hora',
		interval: 30,
		format: 'H:i'
	})




	$('.timepickerEntrada').on('change',function()
	{
		horaEntrada =$(this).val();
		hora = parseInt(horaEntrada.substring(0, 2));
		minutos = parseInt(horaEntrada.substring(3, 5));

		$('.formtimepickerSalida').removeClass('d-none');
		$('.timepickerSalida').pickatime({
			min: [hora+4,minutos],
			max: [16,0],
			clear: 'Quitar Hora',
			interval: 30,
			format: 'H:i'
		})





	})

}




if (document.getElementsByClassName('datepicker'))
{
	var Fecha = new Date();


	$('.datepicker').pickadate({
		today: 'Hoy',
		clear: 'Limpiar',
		close: 'Cerrar',
		format: 'yyyy-mm-dd',
		selectMonths: true,
		min: new Date(Fecha.getFullYear(),  Fecha.getMonth(),Fecha.getDate() +1),

		max: new Date( Fecha.getFullYear()+1,  Fecha.getMonth(),Fecha.getDate() )
	});
}
