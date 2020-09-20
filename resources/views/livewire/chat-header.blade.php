	<div class="chat-cabecera">


		@if(isset($userOut))
					<span class="nombre"><a href="{{$userOut->ProfileUrl}}">{{$userOut->name}} </a></span>
					<span class="estado">{{$userOut->NamePrivilege}}</span>

					@if(!$userOut->active)
							<span class="nombre">Este usuario ha sido bloqueado </span>

		@endif

		@else
							<span class="nombre">Selecciona un chat </span>

		@endif

		
				</div>

