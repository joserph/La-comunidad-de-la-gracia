@extends ('master.layout3')
@section ('title') Menú | La Comunidad de la Gracia @stop
@section ('content')

	<legend><h3>{{ $menus->nombre }}</h3></legend>
	<ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li>{{ HTML::link('menu', 'Configuración de Menú') }}</li>
        <li class="active">{{ $menus->nombre }}</li>
    </ul>
    <blockquote>
		<dl class="dl-horizontal">
		  <dt>Nombre:</dt>
		  <dd>{{ $menus->nombre }}.</dd>
		  <dt>URL:</dt>
		  <dd>{{ $menus->url }}.</dd>
		  <dt>Estatus:</dt>
		  <dd>{{ $menus->estatus }}.</dd>
		  <dt>Tipo:</dt>
		  <dd>{{ $menus->tipo }}.</dd>
	      <dt>Padre:</dt>
	      <dd>{{ $menus->padre }}.</dd>
	      <dt>Cat:</dt>
	      <dd>{{ $menus->cat }}.</dd>
		</dl>

		<small><strong>Creado el 
			<cite title="Source Title">
				{{ date("d/m/Y H:i:s a", strtotime($menus->created_at)) }}
			</cite>
			 por 
			<cite>
				@foreach($users as $user)
		            @if($user->id == $menus->id_user)
		                {{ $user->username }}.
		            @endif
		        @endforeach
			</cite>
		</strong></small>
		<small><strong>Ultima actualización el 
			<cite title="Source Title">
				{{ date("d/m/Y H:i:s a", strtotime($menus->updated_at)) }}
			</cite>
			 por 
			<cite>
				@foreach($users as $user)
		            @if($user->id == $menus->update_user)
		                {{ $user->username }}.
		            @endif
		        @endforeach
			</cite>
		</strong></small>
		</blockquote>
  
@stop