
 
$(document).ready(cerrarDashboardAliniciar)


 

function cerrarDashboardAliniciar()
{

	width= $(window).width();


	if(width<768)
	{
		CerrarDashboard();
	}

}

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


