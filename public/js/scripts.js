$ = jQuery.noConflict();


    $(document).ready(function() {
      //init DateTimePickers
      //materialKit.initFormExtendedDatetimepickers();
    });


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







document.addEventListener('DOMContentLoaded',function() 
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




	citasFecha = $('.citas-fecha');
	citasHora = $('.citas-hora');
	citasDescripcion =$('.citas-descripcion');
	citasPaciente = $('.citas-paciente');

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
});





/*  SWEET ALERT*/





btn_confirm_delete  =function()
{
	swal({
		title: "Cuidado",
		text: "Se eliminara el registro permanentemente",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	}).then((willDelete) => {
	if (willDelete) {


		$('.btn-delete').click();
		swal("Hecho", {
			icon: "success",
		});

	} 
});
}




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

