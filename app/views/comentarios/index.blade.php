@extends('master.layout3')
@section ('title') Comentarios | La Comunidad de la Gracia @stop
@section('content')
	
    <legend><h3>Lista de Comentarios</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
        <li class="active">Lista de Comentarios</li>
    </ul>
	<table class="table table-striped table-hover table-responsive">
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Comentario</th>
        <th>Artículo</th>
        <th>Usuario</th>
        <th>Acciones</th>
    </tr>
    <?php $cont = 0;?>
    @foreach ($comentarios as $coment)
    <tr>
        <td>{{ $cont += 1 }}</td>
        <td>{{ $coment->nombre }}</td>
        <td>{{ substr($coment->comentario, 0, 50) }}...</td>
        @foreach($articulos as $articulo)
            @if($articulo->id == $coment->id_articulo)
                <td>{{ $articulo->title }}</td>
            @endif
        @endforeach
        @foreach($users as $user)
            @if($user->id == $coment->id_user)
                <td>{{ $user->username }}</td>
            @endif
        @endforeach
        @if(Auth::check() && (Auth::user()->id_rol == 0))
        <td>
            <a href="{{ route('comentarios.show', $coment->id)}}" class="btn btn-info btn-xs">Ver </a>
            <a href="{{ route('comentarios.edit', $coment->id)}}" class="btn btn-warning btn-xs"> Editar</a>
        </td>
        @endif
    </tr>
    @endforeach
  </table>
  {{ $comentarios->links() }}
@stop