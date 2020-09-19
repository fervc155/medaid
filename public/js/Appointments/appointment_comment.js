// var quill = new Quill('#editor-container', {
//   modules: {
//     toolbar: [
//       [{ header: [1, 2, false] }],
//       ['bold', 'italic', 'underline'],
//       ['image',]
//     ]
//   },
//   placeholder: 'Compose an epic...',
//   theme: 'snow'  // or 'bubble'
// });




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



// var acform = document.querySelector('#appointment-comment-form');


// $('#submit-comment').click(  function() {

// 	alert('yes');
//   // Populate hidden form on submit
  
//   console.log("Submitted", $(acform).serialize(), $(acform).serializeArray());

  
  
//   // No back end to actually submit to!
//   alert('Open the console to see the submit data!')
//   return false;
// }
// );
