@extends ('master.layout1')
@section ('title') Cron Jobs | La Comunidad de la Gracia @stop
@section ('content')

   
   	<legend><h3>Cron Jobs</h3></legend>
    
    	<blockquote>
		<dl class="dl-horizontal">
		  <dt>Tipo:</dt>
		  <dd>{{ $cronjobs->tipo }}.</dd>
		  <dt>Día:</dt>
		  <dd>{{ $cronjobs->dia }}.</dd>
		  <dt>Tarea:</dt>
		  <dd>{{ $cronjobs->id_tarea }}.</dd>
		</dl>
		<small><strong>Creado el 
			<cite title="Source Title">
				{{ date("d/m/Y H:i:s a", strtotime($cronjobs->created_at)) }}
			</cite>
			 por 
			<cite>
				@foreach($users as $user)
		            @if($user->id == $cronjobs->id_user)
		                {{ $user->username }}.
		            @endif
		        @endforeach
			</cite>
			</strong>
		</small>
		<small><strong>Ultima actualización el 
			<cite title="Source Title">
				{{ date("d/m/Y H:i:s a", strtotime($cronjobs->updated_at)) }}
			</cite>
			 por 
			<cite>
				@foreach($users as $user)
		            @if($user->id == $cronjobs->update_user)
		                {{ $user->username }}.
		            @endif
		        @endforeach
			</cite>
			</strong>
		</small>
		</blockquote>
     
@stop