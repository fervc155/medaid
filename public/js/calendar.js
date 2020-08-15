

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

		self =this;

		this.calendar = new FullCalendar.Calendar(document.getElementById('calendar'), 
		{
			plugins: [ 'dayGrid', ],
			displayEventTime:true,
			eventClick: function(info) {
	       var eventObj = info.event;

		       
		    self.ObtenerCita(eventObj.id);
			},



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

	llenarModal(data)
	{
   		$('#btn-show-appointment').click();	

  		console.log(data['date']);		

		$('#data-date span').html(data['date']);
		$('#data-time span').html(data['time']);
		$('#data-price span').html(data['price']);
		$('#data-patient span').html(data['patient_name']);
		$('#data-doctor span').html(data['doctor_name']);
		$('#data-office span').html(data['office']);
		$('#data-status span').html(data['status']);
	
	 

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

	ObtenerCita(idCita)
	{

		self=this;

 

		$.ajax({

			type:'POST',

			url: $('.datos-calendario #url').data('url2'),

			data:
			{
				id: idCita,
				_token: $('.datos-calendario input[name="_token"]').val()
			},

			success:function(data,success){
			self.llenarModal(JSON.parse(data));
				
				
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

				title:cita['time'],
				start:cita['date'],
				id:cita['id'],
				
				
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