<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>MedAid</title>

	<!-- Bootstrap  material kit-->
	
	<link href="{{ asset('splash/vendor/bootstrap/css/material-kit.css') }}" rel="stylesheet">
	<link href="{{ asset('splash/vendor/bootstrap/css/vertical-nav.css') }}" rel="stylesheet">


	<!-- Íconos -->

	<link href="{{ asset('splash/vendor/fontawesome/css/all.min.css') }}" rel="stylesheet">


	<!-- CHARTIST -->
	<link href="{{ asset('splash/vendor/chartist/css/chartist.min.css') }}" rel="stylesheet">


	<!-- Fuente -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">

	<!-- Data tables -->
	<link href="{{asset('splash/vendor/datatables/datatables.css')}}" rel='stylesheet' />

	<!-- pickadate -->

	<link href="{{ asset('splash/vendor/picker/css/default.css') }}" rel="stylesheet">

	<link href="{{ asset('splash/vendor/picker/css/default.time.css') }}" rel="stylesheet">

	<link href="{{ asset('splash/vendor/picker/css/default.date.css') }}" rel="stylesheet">

	<!-- FULLCALDENDAR-->
	<link href="{{asset('splash/vendor/fullcalendar/core/main.min.css')}}" rel='stylesheet' />

	<link href="{{asset('splash/vendor/fullcalendar/daygrid/main.min.css')}}" rel='stylesheet' />

	<!-- SWEET ALERT -->
	<link href="{{asset('splash/vendor/waitme/waitme.min.css')}}" rel='stylesheet' />

	<!--  SELECT2 -->
	<link href="{{asset('splash/vendor/select2/css/select2.min.css')}}" rel='stylesheet' />
		<!--  QUILLS EDITOR  -->

	<link href="{{asset('splash/vendor/quills/css/quill.snow.css')}}" rel='stylesheet' />
	<link href="{{asset('splash/vendor/quills/css/quill.bubble.css')}}" rel='stylesheet' />




</head>
<body>


	@yield('navegacion')

	<!--  JQUERY -->
	<script src="{{ asset('splash/vendor/jquery/jquery.min.js') }}"></script>
	<!-- Material kit -->
	
	<script src="{{asset('splash/vendor/bootstrap/js/popper.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('splash/vendor/bootstrap/js/bootstrap-material-design.min.js')}}" type="text/javascript"></script>

	<script src="{{asset('splash/vendor/bootstrap/js/material-kit.js?v=2.1.1')}}" type="text/javascript"></script>


	<script src="{{asset('splash/vendor/bootstrap/js/moment.min.js')}}"></script>
	<!-- Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
	<!-- <script src="{{asset('splash/vendor/bootstrap/js/bootstrap-datetimepicker.js')}}" type="text/javascript"></script> -->
	<!-- Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="{{asset('splash/vendor/bootstrap/js/nouislider.min.js')}}" type="text/javascript"></script>

	<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs -->
	<script src="{{asset('splash/vendor/bootstrap/js/bootstrap-tagsinput.js')}}"></script>
	<!-- Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
	<script src="{{asset('splash/vendor/bootstrap/js/bootstrap-selectpicker.js')}}" type="text/javascript"></script>
	<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
	<script src="{{asset('splash/vendor/bootstrap/js/jasny-bootstrap.min.js')}}" type="text/javascript"></script>
	<!-- Plugin for Small Gallery in Product Page -->
	<script src="{{asset('splash/vendor/bootstrap/js/jquery.flexisel.js')}}" type="text/javascript"></script>
	<!-- Plugins for presentation and navigation -->
	<script src="{{asset('splash/vendor/bootstrap/js/modernizr.js')}}" type="text/javascript"></script>
	<script src="{{asset('splash/vendor/bootstrap/js/vertical-nav.js')}}" type="text/javascript"></script>
	<!-- Place this tag in your head or just before your close body tag. -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
	






	<!-- pickadate -->
	<script src="{{ asset('splash/vendor/picker/js/picker.js') }}"></script>
	<script src="{{ asset('splash/vendor/picker/js/picker.time.js') }}"></script>
	<script src="{{ asset('splash/vendor/picker/js/picker.date.js') }}"></script>


	<!-- fulllcallendar -->
	<script src="{{asset('splash/vendor/fullcalendar/core/main.min.js')}}"></script>
	<script src="{{asset('splash/vendor/fullcalendar/daygrid/main.min.js')}}"></script>
	<script src="{{asset('splash/vendor/fullcalendar/moment/main.min.js')}}"></script>
	<script src="{{asset('splash/vendor/fullcalendar/interaction/main.min.js')}}"></script>

	<script src="{{asset('splash/vendor/waitme/waitme.min.js')}}"></script>
	<!--  chartist -->

	<script src="{{asset('splash/vendor/chartist/js/chartist.min.js')}}"></script>


<!-- select2 -->
	<script src="{{asset('splash/vendor/select2/js/select2.min.js')}}"></script>
	<!--  DATA TABLES-->

	<script src="{{asset('splash/vendor/datatables/datatables.js')}}"></script>


	<!--  QUILLS EDITOR  -->


	<script src="{{asset('splash/vendor/quills/js/quill.min.js')}}"></script>


	<!-- SCRIPTS -->

	<?php echo 	'<script type="text/javascript">let _URL = "'.url('').'"</script>'?>

	<script src="{{ asset('js/scripts.js') }}"></script>
	<script src="{{ asset('js/AJAX.js') }}"></script>
	<script src="{{ asset('js/appointments/appointments.js') }}"></script>
	<script src="{{ asset('js/appointments/appointment_comment.js') }}"></script>
	<script src="{{ asset('js/web.js') }}"></script>
	
	
</body>

</html>
