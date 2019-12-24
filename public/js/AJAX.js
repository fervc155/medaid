

/*----------  especialidad  ----------*/

$= jQuery.noConflict();

let timeout;
$('#formulario-especialidades-ajax input[name="search"]').on('keydown', function()
{
	clearTimeout(timeout)
	timeout = setTimeout(() => {
		waitSearchStart();

		let search= $(this).val();


		$.ajax({

			type:'POST',

			url:$('#formulario-especialidades-ajax input[name="url"]').val(),

			data:
			{
				search: $(this).val(),
				_token: $('#formulario-especialidades-ajax input[name="_token"]').val()
			},

			success:function(data,success){
				var especialidades= JSON.parse(data);

				var cantidad =Object.keys(especialidades).length

				var html='';

				for(i=0;i<cantidad;i++)
				{

					html+=
					'<div class="col-6 col-md-4 col-xl-3">\
					<div class="card card-pricing">\
					<div class="card-body ">\
					<h6 class="card-category text-gray">\
					<i class="fal fa-user-md"></i>'+ especialidades[i]['countDoctors'] +' Doctores</h6>\
					<div class="icon icon-info">\
					<i class="fal fa-file-certificate"></i>\
					</div>\
					<h3 class="card-title">'+  especialidades[i]['price'] +'/<small>consulta</small></h3>\
					<p class="card-description">\
					<span class="text-uppercase text-primary">\
					'+  especialidades[i]['name'] +'\
					</span>\
					<div class="stars">';
					for(j=0;j<especialidades[i]['StarsEarned'];j++)
					{

						html+='<i class="fas fa-star"></i>';
					}
					for(j=0;j<especialidades[i]['StarsMissing'];j++)
					{

						html+='<i class="fal fa-star"></i>';
					}


					html+='</div>\
					<div>\
					'+ especialidades[i]['stars']+'\
					</div>\
					</p>\
					<a href="'+_URL+'/visitante/especialidad/'+ especialidades[i]['id']+'" class="btn btn-info btn-round">Ver doctores</a>\
					</div>\
					</div>\
					</div>';

				}

							if(cantidad<1)
				{
					html='<div class="col"><h2>No se encontro nada para: '+search +'</h2></div>';
}				

				$('main.container .row').html(html);
				waitSearchStop();

			}

		});
		clearTimeout(timeout)
	},1000)
});



/*----------   especialidad doctores  ----------*/

$('#formulario-especialidad-doctores-ajax input[name="search"]').on('keydown', function()
{
	clearTimeout(timeout)
	timeout = setTimeout(() => {
		waitSearchStart();
	
		let search= $(this).val();

		$.ajax({

			type:'POST',

			url:$('#formulario-especialidad-doctores-ajax input[name="url"]').val(),

			data:
			{
				search: $(this).val(),
				speciality:$('#formulario-especialidad-doctores-ajax input[name="speciality"]').val(),
				_token: $('#formulario-especialidad-doctores-ajax input[name="_token"]').val()
			},

			success:function(data,success){
				var doctores= JSON.parse(data);

				var cantidad =Object.keys(doctores).length

				var html='';

				for(i=0;i<cantidad;i++)
				{

					html+=
					'<div class="col-6 col-md-4 ">\
					<div class="card card-profile">\
					<div class="card-header card-header-image">\
					<img class="img img-height" src="'+doctores[i]['Profileimg']+'">\
					</div>\
					<div class="card-body ">\
					<h6 class="card-category mt-4 text-gray"><i class="fal fa-file-certificate"></i>'+doctores[i]['speciality']+' '+doctores[i]['price']+'/consulta</h6>\
					<h4 class="card-title"> '+doctores[i]['name']+'</h4>\
					<p class="card-description">\
					<div class="stars">';
					for(j=0;j<doctores[i]['StarsEarned'];j++)
					{

						html+='<i class="fas fa-star"></i>';
					}
					for(j=0;j<doctores[i]['StarsMissing'];j++)
					{

						html+='<i class="fal fa-star"></i>';
					}

					html+='</div>\
					<div>\
					'+ doctores[i]['stars']+'\
					</div>\
					</p>\
					<a href="'+_URL+'/visitante/doctor/'+doctores[i]['id']+'" class="btn btn-info btn-round"><i class="fal fa-calendar-check"></i> Ver Calendario</a>\
					</div>\
					</div>\
					</div>';

				}

					if(cantidad<1)
				{
					html='<div class="col"><h2>No se encontro nada para: '+search +'</h2></div>';
				}

				$('main.container .row').html(html);
				waitSearchStop();

			}

		});
		clearTimeout(timeout)
	},1000)
});




/*----------   doctores  ----------*/

$('#formulario-doctores-ajax input[name="search"]').on('keydown', function()
{
	clearTimeout(timeout)
	timeout = setTimeout(() => {
		waitSearchStart();

		let search= $(this).val();
	

		$.ajax({

			type:'POST',

			url:$('#formulario-doctores-ajax input[name="url"]').val(),

			data:
			{
				search: $(this).val(),
				_token: $('#formulario-doctores-ajax input[name="_token"]').val()
			},

			success:function(data,success){
				var doctores= JSON.parse(data);

				var cantidad =Object.keys(doctores).length

				var html='';

				for(i=0;i<cantidad;i++)
				{

					html+=
					'<div class="col-6 col-lg-4">\
					<div class="card card-profile">\
					<div class="card-header card-header-image">\
					<img class="img img-height" src="'+doctores[i]['Profileimg']+'">\
					</div>\
					<div class="card-body ">\
					<h6 class="card-category mt-4 text-gray"><i class="fal fa-file-certificate"></i>'+doctores[i]['speciality']+' '+doctores[i]['price']+'/consulta</h6>\
					<h4 class="card-title"> '+doctores[i]['name']+'</h4>\
					<p class="card-description">\
					<div class="stars">';
					for(j=0;j<doctores[i]['StarsEarned'];j++)
					{

						html+='<i class="fas fa-star"></i>';
					}
					for(j=0;j<doctores[i]['StarsMissing'];j++)
					{

						html+='<i class="fal fa-star"></i>';
					}


					html+='</div>\
					<div>\
					'+ doctores[i]['stars']+'\
					</div>\
					</p>\
					<a href="'+_URL+'/visitante/doctor/'+doctores[i]['id']+'" class="btn btn-info btn-round"><i class="fal fa-calendar-check"></i> Ver Calendario</a>\
					</div>\
					</div>\
					</div>';

				}

					if(cantidad<1)
				{
					html='<div class="col"><h2>No se encontro nada para: '+search +'</h2></div>';
				}

				$('main.container .row').html(html);
				waitSearchStop();

			}

		});
		clearTimeout(timeout)
	},1000)
});






/*----------   citas  ----------*/

$('#formulario-citas-ajax input[name="search"]').on('keydown', function()
{
	clearTimeout(timeout)
	timeout = setTimeout(() => {
		waitSearchStart();

		let search= $(this).val();
	

		$.ajax({

			type:'POST',

			url:$('#formulario-citas-ajax input[name="url"]').val(),

			data:
			{
				search: $(this).val(),
				_token: $('#formulario-citas-ajax input[name="_token"]').val()
			},

			success:function(data,success){
				var citas= JSON.parse(data);

				var cantidad =Object.keys(citas).length

				var html='';

				for(i=0;i<cantidad;i++)
				{

					html+='\
				  <tr>\
                <td>'+citas[i]['date']+' '+ citas[i]['time']  +'</td>\
                <td>'+citas[i]['price']+'</td>\
                <td><a class="link" href="'+_URL+'/visitante/doctor/'+citas[i]['doctor_id']+'">'+citas[i]['doctor']+' </a></td>\
                <td><a class="link" href="'+_URL+'/visitante/consultorio/'+citas[i]['office_id']+'">'+citas[i]['office']+' </a></td>\
                    <td>'+citas[i]['status']+' </a></td>\
                <td>\
              </tr>';

				}

					if(cantidad<1)
				{
					$('#nombre-paciente').html('No se encontro nada para: '+search);
				}
				else
				{


				$('#nombre-paciente').html(citas[0]['name']);
				}

				$('#body-table-citas').html(html);
				waitSearchStop();

			}

		});
		clearTimeout(timeout)
	},1000)
});



waitSearchStart=function()
{


	$('main.container').waitMe({
		effect : 'bounce',
		text : 'Cargando',
		bg:'#F5F5F5',
		color : 'var(--principal)',
		maxSize : '',
		waitTime : -1,
		textPos : 'vertical',
		fontSize : '',
		source : '',
		onClose : function() {}
	});
}

waitSearchStop=function()
{


	$('main.container').waitMe("hide");
}



