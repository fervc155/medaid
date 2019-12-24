

/*=======================================================
=            SELECT ESPECIALIDAD CONSULTORIO            =
=======================================================*/



/*=====  End of SELECT ESPECIALIDAD CONSULTORIO  ======*/


$('#select-especialidad').change(function(){

	especialidad =$(this).val();

	let card_doctor =$('.card-doctor');
	if (especialidad=="Todos")
	{
		for(i=0; i<card_doctor.length;i++)
	{

		card_doctor[i].classList.remove('d-none');
	}

	return;
	}





	for(i=0; i<card_doctor.length;i++)
	{

		card_doctor[i].classList.add('d-none');
	}

	let card_especialidad =$('.'+especialidad);


	for(i=0; i<card_especialidad.length;i++)
	{

		card_especialidad[i].classList.remove('d-none');

	}


	


})