
class  Calendario
{


	static Existe()
	{

		if(document.getElementById('calendar'))
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	constructor()
	{

		this.calendar = new FullCalendar.Calendar(document.getElementById('calendar'), 
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


		this.ObtenerCitas();
		
	}


	ObtenerCitas()
	{

		self=this;


		$.ajax({

			type:'POST',

			url: $('.datos-calendario #url').data('url'),

			data:
			{
				id: $('.datos-calendario #id').data('id'),
				_token: $('.datos-calendario input[name="_token"]').val()
			},

			success:function(data,success){
				self.LlenarCalendario(JSON.parse(data));
				
				
			}

		});

	}

	LlenarCalendario(citas)
	{



		if(citas.length<1)
		{

			return;
		}

		citas.forEach(cita=>
		{




			var bloqueCita=  
			{

				title:`${cita['time']} ${cita['patient_name']} ${cita['doctor_name']}`,
				start:cita['date']
			}

			this.calendar.addEvent( bloqueCita )
		})

		this.calendar.setOption('locale', 'es');
		this.calendar.render();


	}


	
}




$(document).ready(function()
{

	if(Calendario.Existe())
	{

		let calendario = new Calendario();
	}
})