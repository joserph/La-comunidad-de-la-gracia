@extends ('master.layout3')
@section ('title') Comentario | La Comunidad de la Gracia @stop
@section ('content')

   
   	<legend><h3>Comentarios</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
        <li>{{ HTML::link('comentarios', 'Lista de Comentarios') }}</li>
        <li class="active">Comentario de {{ $comentarios->nombre }}</li>
    </ul>
    	<blockquote>
		<dl class="dl-horizontal">
		  <dt>Nombre:</dt>
		  <dd>{{ $comentarios->nombre }}.</dd>
		  <dt>Comentario:</dt>
		  <dd>{{ $comentarios->comentario }}.</dd>
		</dl>
		<small><strong>Creado el 
			<cite title="Source Title">
				{{ date("d/m/Y H:i:s a", strtotime($comentarios->created_at)) }}
			</cite>
			 por 
			<cite>
				@foreach($users as $user)
		            @if($user->id == $comentarios->id_user)
		                {{ $user->username }}.
		            @endif
		        @endforeach
			</cite>
			</strong>
		</small>
		<small><strong>Ultima actualización el 
			<cite title="Source Title">
				{{ date("d/m/Y H:i:s a", strtotime($comentarios->updated_at)) }}
			</cite>
			 por 
			<cite>
				@foreach($users as $user)
		            @if($user->id == $comentarios->update_user)
		                {{ $user->username }}.
		            @endif
		        @endforeach
			</cite>
			</strong>
		</small>
		</blockquote>
     
@stop