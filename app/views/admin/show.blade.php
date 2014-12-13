@extends ('master.layout3')
@section ('title') Usuario | La Comunidad de la Gracia @stop
@section ('content')

  
  	<legend>Perfil de {{ $user->username }} </legend>
  	<ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li>{{ HTML::link('admin', 'Lista de Usuarios') }}</li>
        <li class="active">Perfil de {{ $user->username }}</li>
    </ul>

    <div class="text-center row">
    	<h1><span class="glyphicon glyphicon-user"></span></h1>
    	<h3>{{ $user->username }}</h3>
    	@if($user->id_rol == 0)
	  		<p>Administrador</p>
	  	@elseif($user->id_rol == 1)
	  		<p>Editor</p>
	 	@else 
	  		<p>Usuario</p>
	  	@endif
    	<p><span class="glyphicon glyphicon-envelope"></span> {{ $user->email }}</p>
    	<p><span class="glyphicon glyphicon-map-marker"></span> Caracas - Venezuela</p>
    	<p><span class="glyphicon glyphicon-star"></span> Registrado el <cite title="Source Title">{{ date("d/m/Y H:i:s a", strtotime($user->created_at)) }}.</cite></p>
        
    </div>
    
@stop