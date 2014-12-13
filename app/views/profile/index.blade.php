@extends ('master.layout4')
@section ('title') Perfil | Iglesia La Comunidad de la Gracia @stop
@section ('content')

  
  	<legend>Perfil de {{ $user->username }} </legend>
  	<ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li class="active">Perfil de {{ $user->username }}</li>
    </ul>

    <div class="text-center row">
    	<h1><span class="glyphicon glyphicon-user"></span></h1>
    	<h3>{{ $user->nombre }}</h3>
    	@if($user->id_rol == 0)
	  		<p>Administrador</p>
	  	@elseif($user->id_rol == 1)
	  		<p>Editor</p>
	 	@else 
	  		<p>Usuario</p>
	  	@endif
    	<p><span class="glyphicon glyphicon-envelope"></span> {{ $user->email }}</p>
    	<p><span class="glyphicon glyphicon-map-marker"></span> {{ $user->ubicacion }}</p>
    	<p><span class="glyphicon glyphicon-star"></span> Registrado el <cite title="Source Title">{{ date("d/m/Y H:i:s a", strtotime($user->created_at)) }}.</cite></p>
        <p><a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn"> Editar</a></p>
        
    </div>
    
@stop