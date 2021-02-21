export function btnConfirmDelete()
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

export function selectSpecialityDoctor()
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

export function btnActualizarEspecialidad()
{

	var ID = $(this).data("id");
	var name =$(this).data("name");
	var cost =$(this).data("cost");

	$('form.actualizar-especialidad input[name="id"]').val(ID);

	$('form.actualizar-especialidad input[name="name"]').val(name);
	$('form.actualizar-especialidad input[name="cost"]').val(cost);

}



export function btnActualizarReceta()
{

	var ID = $(this).data("id");
	var content =$(this).data("content");


	$('form.actualizar-receta input[name="prescription_id"]').val(ID);
	$('form.actualizar-receta textarea').html(content);
	

}



 
export function btnUpdateComment(){

	var ID = $(this).data("commentid");

	console.log(ID);

	$('#btn-update-comment-'+ID).click();
}



export function btnEditComment(){

	var ID = $(this).data("commentid");

	$(this).addClass('d-none');


	$('textarea#'+ID).removeAttr('disabled');
	
	$('span#btn-submit-'+ID).removeClass('d-none');
	
}
/*=====  End of SCRIPTS.js  ======*/


 















/*=================================
=            INIT            =
=================================*/

 

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


 