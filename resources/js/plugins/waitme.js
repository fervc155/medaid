
function esperar()
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


