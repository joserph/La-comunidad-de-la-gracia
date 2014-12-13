@extends('master.layout3')
@section ('title') Usuarios | La Comunidad de la Gracia @stop
@section('content')
	<legend><h3>Lista de Usuarios</h3></legend>
	<ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li class="active">Lista de Usuarios</li>
    </ul>
	<table class="table table-striped table-hover table-responsive">

	    <tr>
	    	<th>#</th>
	        <th>Username</th>
	        <th>Email</th>  
	        <th>Rol</th>
	        <th>Created_at</th>
	        <th>Updated_at</th>
	        <th>Acciones</th>
	    </tr>
	    <?php $cont = 0;?>
	    @foreach ($users as $user)
		    <tr>
		    	<td>{{ $cont += 1 }}</td>
		        <td>{{ $user->username }}</td>
		        <td>{{ $user->email }}</td>
		        <td>{{ $user->id_rol}}</td>
		        <td>{{ date("d/m/Y H:i:s", strtotime($user->created_at)) }}</td>
				<td>{{ date("d/m/Y H:i:s", strtotime($user->updated_at)) }}</td>
		        <td>
		        	<a href="{{ route('admin-show', $user->username) }}" class="btn btn-info btn-xs">Ver </a>
		        	<a href="{{ route('admin.edit', $user->id) }}" class="btn btn-warning btn-xs"> Editar</a>
		        </td>
		    </tr>
    	@endforeach
  	</table>
	{{ $users->links() }}
@stop