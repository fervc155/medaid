/*=================================
=            INIT            =
=================================*/



Grafica = new Grafica();
$(document).ready(()=>
{


	StartMaterialKit();
	cerrarDashboardAliniciar();

})

/*=====  End of INIT  ======*/

/*=================================
=            CALLBACKS            =
=================================*/

$(".btn-confirm-delete").click(btnConfirmDelete);
$(".select-speciality-doctor").on('change', selectSpecialityDoctor);
$(".btn-actualizar-receta").click(btnActualizarReceta);
$(".btn-actualizar-especialidad").click(btnActualizarEspecialidad);
$(".btn-edit-comment").click(btnEditComment);
$(".btn-update-comment").click(btnUpdateComment);
 


/*=====  End of CALLBACKS  ======*/






function StartMaterialKit() {
	$('span.material-icons.check-mark').html('<i class="fal fa-check">');
    //init DateTimePickers
    //materialKit.initFormExtendedDatetimepickers();
};




function cerrarDashboardAliniciar()
{

	width= $(window).width();


	if(width<768)
	{
		CerrarDashboard();
	}

}
/*==============================
=            resize            =
==============================*/



/*----------  cerrar dashboard si la ventana es pequeña  ----------*/

$(document).ready()

$( window ).resize(function() {
 
width= $(window).width();



if(width<768)
{

		if($('.navbar-responsive').hasClass('navbar-responsive-open'))
		{
			CerrarDashboard();

		}
	
	
}
else
{

		if(!$('.navbar-responsive').hasClass('navbar-responsive-open'))
		{

			AbrirDashboard();
		}

}



});
/*=====  End of resize  ======*/





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

$('.navbar-responsive-base').click(AbrirDashboard) 




/*  SWEET ALERT*/











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

})






