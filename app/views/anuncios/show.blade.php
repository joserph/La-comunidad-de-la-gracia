@extends ('master.layout1')
@section ('title') Anuncio | La Comunidad de la Gracia @stop
@section ('content')

   	<legend><h3>{{ $anuncios->nombre }}</h3></legend>
   	<ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
        <li><a href="{{ route('anuncios.index') }}" title="">Lista de Anuncios</a></li>
        <li class="active">{{ $anuncios->nombre }}</li>
    </ul>
    	<blockquote>
		<dl class="dl-horizontal">
		  <dt>Nombre:</dt>
		  <dd>{{ $anuncios->nombre }}.</dd>
		  <dt>Fecha:</dt>
		  <dd>{{ date("d/m/Y", strtotime($anuncios->fecha)) }}.</dd>
		  <dt>Hora:</dt>
		  <dd>{{ date("H:i:s a", strtotime($anuncios->hora)) }}.</dd>
		  <dt>Estatus:</dt>
		  <dd>{{ $anuncios->estatus }}.</dd>
		  <dt>Contenido:</dt>
		  <dd>{{ $anuncios->content }}.</dd>
		</dl>
		<small><strong>Creado el 
			<cite title="Source Title">
				{{ date("d/m/Y H:i:s a", strtotime($anuncios->created_at)) }}
			</cite>
			 por 
			<cite>
				@foreach($users as $user)
		            @if($user->id == $anuncios->id_user)
		                {{ $user->username }}.
		            @endif
		        @endforeach
			</cite>
			</strong>
		</small>
		<small><strong>Ultima actualización el 
			<cite title="Source Title">
				{{ date("d/m/Y H:i:s a", strtotime($anuncios->updated_at)) }}
			</cite>
			 por 
			<cite>
				@foreach($users as $user)
		            @if($user->id == $anuncios->update_user)
		                {{ $user->username }}.
		            @endif
		        @endforeach
			</cite>
			</strong>
		</small>
		</blockquote>
     
@stop