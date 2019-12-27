


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

	if(fecha==undefined || doctor ==undefined)
	{
		return;
	}
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


					


					horaMax= 	datos['outTime'][0]+datos['outTime'][1];	
					minutoMax ="00";

					if (datos['outTime'][3]=='0')
					{
						minutoMax='30';

						horaMax = horaMax-1;
					}


					horaMin =datos['inTime'][0]+datos['inTime'][1];
					minutoMin=datos['inTime'][3]+datos['inTime'][4]; 



					/*let date= $('.appointmentAjax input[name=date]').val();


					if (date == formatDateToday())
					{


					horaActual = new Date().getHours();
					minutoActual = new Date().getMinutes();

					if (horaMin<=horaActual)
					{
						horaMin=horaActual;

						if(minutoActual<30)
						{
							if(minutoMin=='00')
							{
								horaMin+=1;
							}
							else 	if(minutoActual>=30)
							{
								horaMin+=1;
								minutoMin='30';

							}
						}

					}

					if(horaMax>=horaActual)
					{
						Alert('Ya No puedes registrar citas hoy ');
					$('.groupTimepickerCita').html('<label class="bmd-label-floating">Hora</label><input disabled class="form-control timepicker timepickerCita" name="time" type="time" value=""  id="select-time">');
					}

					}*/

					$('.groupTimepickerCita').html('<label class="bmd-label-floating">Hora</label><input class="form-control timepicker timepickerCita" name="time" type="time" value=""  id="select-time">');
					fijarMiHora();

				

					$('.timepickerCita').pickatime({
						min: [horaMin,minutoMin],
						max:[horaMax,minutoMax],
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


	if(horaActual==undefined)
	{
		return;
	}

	if(horaActual.length>0)
	{


	 $('.appointmentAjax input#select-time').val(horaActual);
	}

}

$('.appointment-reestablecer-hora').click(function()
{



	fijarMiHora();

})
















/*=================================
=            functions            =
=================================*/
function formatDateToday() {
    var d = new Date(),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}


/*=====  End of functions  ======*/
