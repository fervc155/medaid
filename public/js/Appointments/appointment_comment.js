var quill = new Quill('#editor-container', {
  modules: {
    toolbar: [
      [{ header: [1, 2, false] }],
      ['bold', 'italic', 'underline'],
      ['image',]
    ]
  },
  placeholder: 'Compose an epic...',
  theme: 'snow'  // or 'bubble'
});




//$('#editor-container .ql-editor').html()




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
