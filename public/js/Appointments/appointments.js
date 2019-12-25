

/*============================
=            AJAX            =
============================*/





$(window).on('load',function()
{

	let fecha =$('.appointmentAjax input[name="date"]').val();
	let doctor =$('.appointmentAjax select[name="doctor_id"]').val();
	appointmentAjaxLlenarHorario(fecha,doctor);


});

$('.appointmentAjax input[name="date"]').on('change', function()
{




	let fecha=$(this).val();
	let doctor =$('.appointmentAjax select[name="doctor_id"]').val();




	appointmentAjaxLlenarHorario(fecha,doctor);





});


$('.appointmentAjax select[name="doctor_id"]').on('change', function()
{




	let doctor=$(this).val();
	let fecha =$('.appointmentAjax input[name="date"]').val();



	appointmentAjaxLlenarHorario(fecha,doctor);





});

let datos;
let desabilitado;
function appointmentAjaxLlenarHorario(fecha,doctor)
{
	if(fecha.length>0 && doctor.length>0)
	{
				$('.groupTimepickerCita .bmd-label-floating').html('Hora');
 				 


		$.ajax({

			type:'POST',

			url:$('.appointmentAjax input[name="url"]').val(),

			data:
			{
				date: fecha,
				doctor:doctor,
				_token: $('.appointmentAjax input[name="_token"]').val()
			},

			success:function(data,success){
				 datos= JSON.parse(data);

				var cantidad =Object.keys(datos).length


				if (document.getElementsByClassName('timepicker'))
				{


					$('.groupTimepickerCita').html('<label class="bmd-label-floating">Hora</label><input class="form-control timepicker timepickerCita" name="time" type="time" value=""  id="select-time">');
					fijarMiHora();


					hora= 	datos['outTime'][0]+datos['outTime'][1];	
					minutos ="00";

					desabilitado =[[15,30],[14,30]];

					if (datos['outTime'][3]=='0')
					{
						minutos='30';

						hora = hora-1;
					}

					$('.timepickerCita').pickatime({
						min: [datos['inTime'][0]+datos['inTime'][1],datos['inTime'][3]+datos['inTime'][4]],
						max:[hora,minutos],
						clear: 'Quitar Hora',
						interval: 30,
						format: 'H:i',
						 onClose: function() {
	    			$('.groupTimepickerCita .bmd-label-floating').html('');
 				 },})


					for(t=0;t<datos['hours'].length;t++)
					{
						$('[aria-label="'+ datos['hours'][t] +'"]').remove();
					}


				}


			}

		});
	}
}


/*=====  End of AJAX  ======*/



fijarMiHora = function()
{


	horaActual = $('.appointmentAjax input[name=my-time]').val();

	if(horaActual.length>0)
	{
		

	 $('.appointmentAjax input#select-time').val(horaActual);
	}

}

$('.appointment-reestablecer-hora').click(function()
{



	fijarMiHora();

})