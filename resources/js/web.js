/*============================================
=            Establecer callbacks            =
============================================*/
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


$('#select-especialidad').change(filtrarMedicoPorEspecialidad);



/*=====  End of Establecer callbacks  ======*/








