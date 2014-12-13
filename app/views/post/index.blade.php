@extends('master.layout1')
@section ('title') Artículos | La Comunidad de la Gracia @stop
@section('content')
	
	<h1><a href="{{ route('post.create') }}" class="btn btn-success btn-sm">Crear Artículo</a></h1>
    <legend><h3>Lista de Artículos</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
        <li class="active">Lista de Artículos</li>
    </ul>
    	<table class="table table-striped table-hover table-responsive">
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>URL</th> 
            <th>Estatus</th> 
            <th>Comentario</th> 
            <th>Acciones</th>
        </tr>
        <?php $cont = 0;?>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $cont += 1 }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->url }}</td>
            <td class="text-uppercase">{{ $post->estatus }}</td>
            <td class="text-uppercase">{{ $post->comentario }}</td>
            <td>
                <a href="{{ URL::route('predicas-show', $post->url) }}" class="btn btn-info btn-xs">Ver </a>
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning btn-xs"> Editar</a>
            </td>
        </tr>
        @endforeach
      </table>
    {{ $posts->links() }}
@stop