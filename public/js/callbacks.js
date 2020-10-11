
/*=======================================================

				WEB.JS

=======================================================*/

// =            SELECT ESPECIALIDAD CONSULTORIO            =



function filtrarMedicoPorEspecialidad()
{

	especialidad =$(this).val();

	let card_doctor =document.querySelectorAll('.card-doctor');


	if (especialidad=="Todos")
	{
	
	
		card_doctor.forEach(doctor=>
		{

			doctor.classList.remove('d-none');
		})

		return;
	}




	card_doctor.forEach(doctor=>
	{

		doctor.classList.add('d-none');
	})

	let card_especialidad =document.querySelectorAll('.'+especialidad);


	card_especialidad.forEach(especialidad=>
	{

		especialidad.classList.remove('d-none');

	})


}
/*=====  End of SELECT ESPECIALIDAD CONSULTORIO  ======*/








/*==================================
=            SCRIPTS.js            =
==================================*/


function btnConfirmDelete()
{

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

}

function selectSpecialityDoctor()
{

	id=$(this).val();


	$('.speciality-price').each(function()
	{
		if(!$(this).hasClass('d-none'))
		{
		$(this).addClass('d-none')

		}

	})


	$('#speciality-price-'+id).removeClass('d-none')




}


///btn borrar especialidad

function btnActualizarEspecialidad()
{

	var ID = $(this).data("id");
	var name =$(this).data("name");
	var cost =$(this).data("cost");

	$('form.actualizar-especialidad input[name="id"]').val(ID);

	$('form.actualizar-especialidad input[name="name"]').val(name);
	$('form.actualizar-especialidad input[name="cost"]').val(cost);

}



function btnActualizarReceta()
{

	var ID = $(this).data("id");
	var content =$(this).data("content");


	$('form.actualizar-receta input[name="prescription_id"]').val(ID);
	$('form.actualizar-receta textarea').html(content);
	

}



 
function btnUpdateComment(){

	var ID = $(this).data("commentid");

	console.log(ID);

	$('#btn-update-comment-'+ID).click();
}



function btnEditComment(){

	var ID = $(this).data("commentid");

	$(this).addClass('d-none');


	$('textarea#'+ID).removeAttr('disabled');
	
	$('span#btn-submit-'+ID).removeClass('d-none');
	
}
/*=====  End of SCRIPTS.js  ======*/
