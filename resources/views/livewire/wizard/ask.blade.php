  <div class="row justify-content-center align-items-center  wizard-ask h-100">



        <div class="col-6 text-center">

			<h2>Elije una especialidad</h2>

            <div class="form-group form-inline align-items-end">
              <div class="icon-form">
                <i class="fal fa-user-tie"></i>
              </div>
              <div class="form-group">

                <select data-size="7" class="selectpicker" name="wizard_speciality" id="wizard_speciality" data-style="select-with-transition" title="Elije una especialidad" data-size="sd7">

                  <?php foreach ($specialities as $speciality) : ?>

                    <option value="{{ $speciality->name}}" >{{ $speciality->name }}</option>

                  <?php endforeach ?>
                </select>


              </div>
            </div>

            <button id="wizard-get-response" class="btn d-none btn-primary">Listo</button>


      </div>

    </div>




<script type="text/javascript">
	

	$(document).ready(function()
	{


		$('[name=wizard_speciality]').on('change',function()
		{
		
			$('#wizard-get-response').removeClass('d-none');
		});


		$('#wizard-get-response').on('click',function()
		{
				let speciality = $('select[name=wizard_speciality]').val().toLowerCase();

     			$('.wizard-ask').fadeOut();
			
      			$('.wizard-response').fadeIn();

				Livewire.emit('wizard_getResponse',speciality);

		})
	})


</script>