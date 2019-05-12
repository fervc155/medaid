var Fecha = new Date();

$('.datepicker').pickadate({
	today: 'Hoy',
	clear: 'Limpiar',
	close: 'Cerrar',
	format: 'yyyy-mm-dd',
	selectMonths: true,
	min: new Date(Fecha.getFullYear(),  Fecha.getMonth(),Fecha.getDate() ),

	max: new Date( Fecha.getFullYear()+1,  Fecha.getMonth(),Fecha.getDate() )
});


$('.datepicker2').pickadate({
	today: 'Hoy',
	clear: 'Limpiar',
	close: 'Cerrar',
	format: 'yyyy-mm-dd',
	selectMonths: true,
	selectYears: 100,


	max: new Date( Fecha.getFullYear()-18,  Fecha.getMonth(),Fecha.getDate() )
});

$('.timepicker').pickatime({
	min: [9,0],
	max: [16,0],
	clear: 'Quitar Hora',
	interval: 30,
	format: 'H:i'
})







/*  FULL CALENDAR*/








document.addEventListener('DOMContentLoaded', function() {


	var calendarEl = document.getElementById('calendar');

	
	var calendar = new FullCalendar.Calendar(calendarEl, {
		plugins: [ 'dayGrid', ],


		customButtons: {
			myCustomButton: {
				text: 'custom!',
				click: function() {
				}
			}
		},
		header: {
			left: 'title ',
			center: 'prev,next today',
			right: 'dayGridMonth,dayGridWeek,dayGridDay'
		},

		
	});




	citasFecha = $('.citas-fecha');
	citasHora = $('.citas-hora');
	citasDescripcion =$('.citas-descripcion');
	citasPaciente = $('.citas-paciente');

	for (var i =0; i<citasFecha.length; i++) {
		

		var cita=  
		{title: citasPaciente[i].innerHTML,
			start:citasFecha[i].innerHTML
		}
		

		calendar.addEvent( cita )
	}


	calendar.setOption('locale', 'es');
	
	calendar.render();
});

