	<div class="chat-cabecera">


		@if(isset($userOut))
					<span class="nombre"><a href="{{$userOut->ProfileUrl}}">{{$userOut->name}} </a></span>
					<span class="estado">{{$userOut->NamePrivilege}}</span>

		@else
							<span class="nombre">Selecciona un chat </span>

		@endif
				</div>

