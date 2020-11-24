
  <div class="row justify-content-center align-items-center h-100 wizard-home">
    <div class="col-6 text-center">

			<h2>Quieres que te recomendemos algun médico?</h2>
			<p>Para clasificarte con un medico usamos datos generales de los pacientes como, codigo postal, edad, sexo, etc</p>

			<button  id="wizard-home-yes" class="btn btn-success">Si porfavor</button>
			<a href="{{url('/home')}}" class="btn btn-danger">No, paso</a>


      </div>
      </div>





      <script type="text/javascript">
      	

      	$(document).ready(function()
      	{

      			$('.wizard-ask').fadeOut();
      			$('.wizard-response').fadeOut();


      		$('#wizard-home-yes').on('click',function()
      		{
      			$('.wizard-home').fadeOut();

      			$('.wizard-ask').fadeIn();

      		});
      	})

      </script>