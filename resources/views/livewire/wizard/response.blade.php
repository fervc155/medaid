
  <div class="row justify-content-center align-items-center h-100  wizard-response">
    <div class="col-12 text-center">

			<h2>Obteniedo recomendaciones</h2>
			<p>{{$text}}</p>

			<button class="btn btn-link btn-wizard-back">volver</button>
			<a href="{{url('/home')}}"  class="btn btn-primary ">Ir al inicio</a>


      </div>


			<?php foreach ($doctors as $doctor): ?>
		 @include('hospital.includes.card-profile-doctor',['wizardActive'=>true])
				
			<?php endforeach ?>

      </div>






<script type="text/javascript">
	

	$(document).ready(function()
	{


		$('button.btn-wizard-back').on('click',function()
		{
			$('.wizard-response').fadeOut();

      			$('.wizard-ask').fadeIn();
		});


	})


</script>