<div>


                <select class="select2" name="month" id="month" data-style="select-with-transition" title="Selecciona un consultorio" data-size="sd7">	

<option value="X">Todo el Tiempo</option>
		
        <option value="00" selected>Este año</option>
		        	
		<option value="01">Enero</option>
		<option value="02">Febrero</option>
		<option value="03">Marzo</option>
		<option value="04">Abril</option>
		<option value="05">Mayo</option>
		<option value="06">Junio</option>
		<option value="07">Julio</option>
		<option value="08">Agosto</option>
		<option value="09">Septiembre</option>

		<option value="10">Octubre</option>
		<option value="11">Noviembre</option>
		<option value="12">Diciembre</option>
	</select>

</div>



<script type="text/javascript">

	$(document).ready(function()
	{
		Livewire.emit('bi_year');
		Livewire.emit('loadChart');
	})
	
	$('select[name=month]').on('change',function()
	{

		if($(this).val()=='00')
			Livewire.emit('bi_year');
		else if($(this).val()=='X')
			Livewire.emit('bi_all');
		else
			Livewire.emit('bi_month',$(this).val());
	})
</script>