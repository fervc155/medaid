 
$= jQuery.noConflict();

$(document).ready(()=>
{
	$('span.material-icons.check-mark').html('<i class="fal fa-check">');

	$(".select2").select2();
})

 



import './plugins/calendar';
import './plugins/datatables';
import './plugins/datepicker';
import './plugins/waitme';

 
import './public-search';
import './Appointments/appointments.js';
import './Appointments/appointment_comment.js';
import './dashboard';
import './buttons';
import './chat';
import './stars';
import './web';