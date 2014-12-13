@extends('master.layout1')
@section ('title') Predicas | La Comunidad de la Gracia @stop
@section('content')
	
	<h1><a href="{{ route('predicas.create') }}" class="btn btn-success btn-sm">Crear Predica</a></h1>
    <legend><h3>Lista de Predicas</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
        <li class="active">Lista de Predicas</li>
    </ul>
    <div class="table-responsive">
	<table class="table table-striped table-hover table-responsive">
    <tr>
        <th>Título</th>
        <th>URL</th>  
        <th>Comentarios</th>
        <th>Estatus</th>
        <th>Acciones</th>
    </tr>
    @foreach ($predicas as $predica)
    <tr>
        <td>{{ $predica->title }}</td>
        <td>{{ $predica->url }}</td>
        <td class="text-uppercase">{{ $predica->comentario }}</td>
        <td class="text-uppercase">{{ $predica->estatus }}</td>
        <td>
            <a href="{{ URL::route('predicas-show', $predica->url) }}" class="btn btn-info btn-xs">Ver </a>
            <a href="{{ route('predicas.edit', $predica->id) }}" class="btn btn-warning btn-xs"> Editar</a>
        </td>
    </tr>
    @endforeach
    </table>
    </div>
    {{ $predicas->links() }}
@stop