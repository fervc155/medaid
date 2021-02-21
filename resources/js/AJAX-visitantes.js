

/*----------  especialidad  ----------*/


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

				var html='';



				especialidades.forEach(especialidad=>
				{
					html+= especialidadCard(especialidad);
				})
				if(especialidades.length<1)
				{
					html=`<div class="col"><h2>No se encontro nada para: '${search}</h2></div>`;
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
				var html='';


				doctores.forEach(doctor=>
				{

					html += doctorCard(doctor);
				})

				if(doctores.length<1)
				{
					html=`<div class="col"><h2>No se encontro nada para: ${search} </h2></div>`;
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

			success: (data,success)=>{
				var doctores= JSON.parse(data);

				var html='';



				doctores.forEach(doctor=>
				{

					html+= doctorCard(doctor)
					console.log("html", html);


				})


				if(doctores.length<1)
				{
					html=`<div class="col"><h2>No se encontro nada para: ${search}</h2></div>`;
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
				id: $(this).val(),
				_token: $('#formulario-citas-ajax input[name="_token"]').val()
			},

			success:function(data,success){
				var citas= JSON.parse(data);


				var html='';

				citas.forEach(cita=>
				{

					html+=`
					<tr>
					<td>${cita['date']} - ${cita['time']}  </td>
					<td>${cita['price']}</td>
					<td><a class="link" href="${_URL}/visitante/doctor/${cita['doctor_id']}">${cita['doctor_name']}</a></td>
					<td><a class="link" href="${_URL}/visitante/consultorio/${cita['office_id']}">${cita['office']}</a></td>
					<td>${cita['status']}</a></td>
					<td>
					</tr>`;

				})

				if(citas.length<1)
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






function doctorCard(doctor)
{

	html = `
	<div class="col-sm-6 col-md-4 ">
	<div class="card card-profile">
	<div class="card-header card-header-image">
	<img style="max-width: 100%;" class="img img-fluid" src="${doctor['Profileimg']}">
	</div>
	<div class="card-body ">
	<h6 class="card-category mt-4 text-gray"><i class="fal fa-file-certificate"></i>
	${doctor['MinMaxCost']}</h6>
	<h4 class="card-title"> ${doctor['name']}</h4>
	<p class="card-description">
	<div class="stars">`

	for(j=0;j<doctor['StarsEarned'];j++)
	{

		html+='<i class="fas fa-star"></i>';
	}

	for(j=0;j<doctor['StarsMissing'];j++)
	{

		html+='<i class="fal fa-star"></i>';
	}


	html+=`
	</div>
	<div>
	${doctor['stars']}
	</div>

	<div>`;



	if(null != doctor['specialities'])
	{

		doctor['specialities'].forEach(speciality=>
		{
			html+=`<span class="badge badge-pill badge-primary">${speciality['name']}</span>`;

		}) 

	}
	html+=`	
	</div>

	</p>
	<a href="${_URL}/visitante/doctor/${doctor['id']}" class="btn btn-info btn-round"><i class="fal fa-calendar-check"></i> Ver Calendario</a>
	</div>
	</div>
	</div>
	`;

	return html;


}




function especialidadCard(especialidad)
{
	html=
	`<div class="col-6 col-md-4 col-xl-3">
	<div class="card card-pricing">
	<div class="card-body ">
	<h6 class="card-category text-gray">
	<i class="fal fa-user-md"></i> ${especialidad['countDoctors']} Doctores</h6>
	<div class="icon icon-info">
	<i class="fal fa-file-certificate"></i>
	</div>
	<h3 class="card-title">${especialidad['price']} <small>consulta</small></h3>
	<p class="card-description">
	<span class="text-uppercase text-primary">
	${especialidad['name']}
	</span>
	<div class="stars">`;

	for(j=0;j<especialidad['StarsEarned'];j++)
	{

		html+='<i class="fas fa-star"></i>';
	}
	for(j=0;j<especialidad['StarsMissing'];j++)
	{

		html+='<i class="fal fa-star"></i>';
	}


	html+=`</div>
	<div>
	${especialidad['stars']}
	</div>
	</p>
	<a href="${_URL}/visitante/especialidad/${especialidad['id']}" class="btn btn-info btn-round">Ver doctores</a>
	</div>
	</div>
	</div>`;


	return html;

}