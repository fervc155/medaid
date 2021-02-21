

$(document).ready(function() {
//data tables

let data ={
	"lengthMenu": "Mostrar _MENU_ registros por página",
	"zeroRecords": "No se encontró ningún resultado :(",
	"info": "Mostrando página _PAGE_ de _PAGES_",
	"infoEmpty": "No hay registros disponibles.",
	"infoFiltered": "(filtrado de _MAX_ registros en total)",
	"search": "Buscar:",
	"paginate": {
		"first":      "Primera",
		"last":       "Última",
		"next":       "Siguiente",
		"previous":   "Anterior"
	}
}

$('#data_table').DataTable({
	"language": data
});

$('#data_table_pacientes').DataTable({
	"language": data
});

$('#data_table_medicos').DataTable({
	"language": data
});
$('#data_table_citas').DataTable({
	"language": data
});

$('#data_table_consultorios').DataTable({
	"language": data
});


$('#data_table_today').DataTable({
	"language": data
});


$('#data_table_pending').DataTable({
	"language": data
});





}


);




