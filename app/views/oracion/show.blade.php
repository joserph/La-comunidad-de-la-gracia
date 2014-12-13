@extends ('master.layout3')
@section ('title') Petición de oración | La Comunidad de la Gracia @stop
@section ('content')

   
   	<legend><h3>Petición de Oración</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
        <li>{{ HTML::link('oracion', 'Peticiones de Oración') }}</li>
        <li class="active">Petición de {{ $oraciones->nombre }}</li>
    </ul>
    	<blockquote>
		<dl class="dl-horizontal">
		  <dt>Nombre:</dt>
		  <dd>{{ $oraciones->nombre }}.</dd>
		  <dt>Email:</dt>
		  <dd>{{ $oraciones->email }}.</dd>
		  <dt>Petición:</dt>
		  <dd>{{ $oraciones->peticion }}.</dd>
		</dl>
		<small><strong>Petición realizada el 
			<cite title="Source Title">
				{{ date("d/m/Y", strtotime($oraciones->created_at)) }} a las
				{{ date("H:i:s a", strtotime($oraciones->created_at)) }}
			</cite>
		</small>
		</blockquote>
     
@stop