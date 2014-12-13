@extends ('master.layout1')
@section ('title') {{ $biblia->libro }} {{ $biblia->capitulo }}:{{ $biblia->versiculo }} | La Comunidad de la Gracia @stop
@section ('content')

   
   	<legend><h3>{{ $biblia->libro }} {{ $biblia->capitulo }}:{{ $biblia->versiculo }}</h3></legend>
    
    	<blockquote>
		<dl class="dl-horizontal">
		  <dt>Libro:</dt>
		  <dd>{{ $biblia->libro }}.</dd>
		  <dt>Capítulo:</dt>
		  <dd>{{ $biblia->capitulo }}.</dd>
		  <dt>Versículo:</dt>
		  <dd>{{ $biblia->versiculo }}.</dd>
		  <dt>Contenido:</dt>
		  <dd>{{ $biblia->content }}</dd>
		</dl>
		@if(Auth::check())
		<small><strong>Creado el 
			<cite title="Source Title">
				{{ date("d/m/Y H:i:s a", strtotime($biblia->created_at)) }}
			</cite>
			 por 
			<cite>
				@foreach($users as $user)
		            @if($user->id == $biblia->id_user)
		                {{ $user->username }}.
		            @endif
		        @endforeach
			</cite>
			</strong>
		</small>
		<small><strong>Ultima actualización el 
			<cite title="Source Title">
				{{ date("d/m/Y H:i:s a", strtotime($biblia->updated_at)) }}
			</cite>
			 por 
			<cite>
				@foreach($users as $user)
		            @if($user->id == $biblia->update_user)
		                {{ $user->username }}.
		            @endif
		        @endforeach
			</cite>
			</strong>
		</small>
		@endif
		</blockquote>
     
@stop