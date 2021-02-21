 


$(".btn-confirm-delete-comment").click(function(){

	var ID = $(this).attr("comment-id");


	swal({
		title: "Cuidado",
		text: "Se eliminara el comentario permanentemente",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	}).then((willDelete) => {
		if (willDelete) {


			$('#btn-delete-comment-'+ID).click();
			swal("Hecho", {
				icon: "success",
			});

		} 
	});

});


 