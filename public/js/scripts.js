
$(document).ready(function() {
    //init DateTimePickers
    //materialKit.initFormExtendedDatetimepickers();
});




var Fecha = new Date();

if (document.getElementsByClassName('datepicker'))
{

	$('.datepicker').pickadate({
		today: 'Hoy',
		clear: 'Limpiar',
		close: 'Cerrar',
		format: 'yyyy-mm-dd',
		selectMonths: true,
		min: new Date(Fecha.getFullYear(),  Fecha.getMonth(),Fecha.getDate() ),

		max: new Date( Fecha.getFullYear()+1,  Fecha.getMonth(),Fecha.getDate() )
	});
}

if (document.getElementsByClassName('datepicker2'))
{


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


	$('.timepickerCita').pickatime({
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



////////// var responsive

function CerrarDashboard()
{
	if($('.navbar-responsive').hasClass('navbar-responsive-open'))
	{

		$('.navbar-responsive').removeClass('navbar-responsive-open');
		$('.main-admin').removeClass('main-admin-open');
		$('#button-dashboard').removeClass('button-dashboard-open');
		$('#button-menu').removeClass('button-menu-disabled');
	}			
}

function AbrirDashboard()
{
	if(!$('.navbar-responsive').hasClass('navbar-responsive-open'))
	{


		$('.navbar-responsive').addClass('navbar-responsive-open');
		$('.main-admin').addClass('main-admin-open');
		$('#button-dashboard').addClass('button-dashboard-open');
		$('#button-menu').addClass('button-menu-disabled');

	}
}
$('#button-dashboard').click(function()
{

	if($('.navbar-responsive').hasClass('navbar-responsive-open'))
	{
		CerrarDashboard();

	}
	else
	{

		AbrirDashboard();


	}
	

})

$('.navbar-responsive-base').click(function()
{
	AbrirDashboard()
}) 




/*  FULL CALENDAR*/







$(document).ready(function()
{


	/*chart*/

//grafica cantidad citas

if ($('#grafica-cantidad-citas')>0)
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

if ($('#grafica-ventas-mes')>0)
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

//grarfica relacion citas
if ($('#grafica-relacion-citas')>0)
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

//grafica peores  medicos
if ($('#grafica-peores-medicos')>0)
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

//grafica mejores  medicos
if ($('#grafica-mejores-medicos')>0)
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
	///

	if ($('#grafica-cantidad-citas')>0)
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


	/*full calendar*/
	if (document.getElementById('calendar'))
	{


		var calendarEl = document.getElementById('calendar');


		var calendar = new FullCalendar.Calendar(calendarEl, 
		{
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




		citasHora = $('.citas-hora');
		citasDescripcion =$('.citas-descripcion');
		citasPaciente = $('.citas-paciente');
		citasFecha = $('.citas-fecha');

		for (var i =0; i<citasFecha.length; i++) 
		{


			var cita=  
			{title: citasPaciente[i].innerHTML,
				start:citasFecha[i].innerHTML
			}


			calendar.addEvent( cita )
		}


		calendar.setOption('locale', 'es');

		calendar.render();


	}



});





/*  SWEET ALERT*/






$(".btn-confirm-delete").click(function(){

	var ID = $(this).attr("id");
	swal({
		title: "Cuidado",
		text: "Se eliminara el registro permanentemente",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	}).then((willDelete) => {
		if (willDelete) {


			$('.btn-delete#'+ID).click();
			swal("Hecho", {
				icon: "success",
			});

		} 
	});

});


///btn borrar especialidad


$(".btn-actualizar-especialidad").click(function(){

	var ID = $(this).data("id");
	var name =$(this).data("name");
	var cost =$(this).data("cost");

	$('form.actualizar-especialidad input[name="id"]').val(ID);

	$('form.actualizar-especialidad input[name="name"]').attr('placeholder',name);
	$('form.actualizar-especialidad input[name="cost"]').attr('placeholder',cost);

});



$(".btn-AgregarPrecioCita").on('change',function(){

	var cost =$('.btn-AgregarPrecioCita option:selected').data('cost');
	console.log(cost);

	$('input[name="cost"]#PrecioCita').val(cost);

});

/* WAITME*/

esperar=function()
{


	$('body').waitMe({
		effect : 'bounce',
		text : 'Cargando',
		bg:'white',
		color : 'var(--principal)',
		maxSize : '',
		waitTime : -1,
		textPos : 'vertical',
		fontSize : '',
		source : '',
		onClose : function() {}
	});
}


$('nav a.nav-link').on('click',function()
{
//	esperar()
});

$('.link').on('click',function()
{
	esperar()
});


$('.btn-wait').on('click',function()
{
	esperar()
});



$('.no-wait').attr("onclick", "").unbind("click");




/* chat*/


if ($('.chat-contenido').lenght>0)
{


	$(".chat-contenido").scrollTop($(".chat-contenido")[0].scrollHeight);

}


//select2
$(document).ready(function() {

$(".select2").select2({
 
});




//data tables

    let data ={
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "No se encontró ningún resultado :(",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles.",
        "infoFiltered": "(filtrado de _MAX_ registros en total)",
        "search": "Buscar:",
        "paginate": {
          "first":      "Primera",
          "last":       "Última",
          "next":       "Siguiente",
          "previous":   "Anterior"
        }
      }

    $('#data_table').DataTable({
      "language": data
      });
      $('#data_table_citas').DataTable({
      "language": data
      });
  
    $('#data_table_pacientes').DataTable({
      "language": data
      });
  
    $('#data_table_medicos').DataTable({
      "language": data
      });
  
    $('#data_table_consultorios').DataTable({
      "language": data
      });
  
  
    $('#data_table_today').DataTable({
      "language": data
      });


    $('#data_table_pending').DataTable({
      "language": data
      });
  

  
  

  }

  
 );







