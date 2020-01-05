$(document).ready(function()
{

	/*full calendar*/
	if (document.getElementById('calendar'))
	{


		var calendarEl = document.getElementById('calendar');


		var calendar = new FullCalendar.Calendar(calendarEl, 
		{
			plugins: [ 'dayGrid', ],
			displayEventTime:true,



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




		citasHora = $('.citas-hora');
		citasDescripcion =$('.citas-descripcion');
		citasPaciente = $('.citas-paciente');
		citasFecha = $('.citas-fecha');

		for (var i =0; i<citasFecha.length; i++) 
		{


			var cita=  
			{

				title:citasHora[i].innerHTML+" "+ citasPaciente[i].innerHTML,
				start:citasFecha[i].innerHTML
			}


			calendar.addEvent( cita )
		}


		calendar.setOption('locale', 'es');

		calendar.render();


	}

})