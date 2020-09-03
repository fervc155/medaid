<div class="card caja-contador">

	<?php $i = 0;

	foreach ($appointments as $a) {
		if ($a->completed == false) {
			$i++;
		}
	}

	?>
	<span class="caja-contador-icono"><i class="fal fa-book"></i></span>
	<div class="card-body">


		<h3>{{$i}}</h3>
		<p>Citas</p>
	</div>
</div>