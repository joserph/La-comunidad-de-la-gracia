@extends ('master.layout1')
@section ('title') Sliders | La Comunidad de la Gracia @stop
@section ('content')

	<legend><h3>{{ $sliders->titulo }}</h3></legend>
	<ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li>{{ HTML::link('menu', 'Configuración de Menú') }}</li>
        <li>{{ HTML::link('slider', 'Lista de sliders') }}</li>
        <li class="active">{{ $sliders->titulo }}</li>
    </ul>
    <blockquote>
		<dl class="dl-horizontal">
		  <dt>titulo:</dt>
		  <dd>{{ $sliders->titulo }}.</dd>
		  <dt>ruta:</dt>
		  <dd>{{ $sliders->ruta }}.</dd>
		  <dt>content:</dt>
		  <dd>{{ $sliders->content }}.</dd>
		  <dt>f_nombre:</dt>
		  <dd>{{ $sliders->f_nombre }}.</dd>
	      <dt>f_ruta:</dt>
	      <dd>{{ $sliders->f_ruta }}.</dd>
	      <dt>f_exten:</dt>
	      <dd>{{ $sliders->f_exten }}.</dd>
	      <dt>file:</dt>
	      <dd>
		    <img src="{{ 'http://localhost/cdlgracia/Autenticacion/public/'.$sliders->f_ruta }}" class="img-responsive img-thumbnail" width="100" alt="{{ $sliders->f_name }}">
	      </dd>

		</dl>

		<small><strong>Creado el 
			<cite title="Source Title">
				{{ date("d/m/Y H:i:s a", strtotime($sliders->created_at)) }}
			</cite>
			 por 
			<cite>
				@foreach($users as $user)
		            @if($user->id == $sliders->id_user)
		                {{ $user->username }}.
		            @endif
		        @endforeach
			</cite>
		</strong></small>
		<small><strong>Ultima actualización el 
			<cite title="Source Title">
				{{ date("d/m/Y H:i:s a", strtotime($sliders->updated_at)) }}
			</cite>
			 por 
			<cite>
				@foreach($users as $user)
		            @if($user->id == $sliders->update_user)
		                {{ $user->username }}.
		            @endif
		        @endforeach
			</cite>
		</strong></small>
		</blockquote>
  
@stop