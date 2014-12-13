@extends('master.layout1')
@section ('title') Anuncios | La Comunidad de la Gracia @stop
@section('content')
	
	<h1><a href="{{ route('anuncios.create') }}" class="btn btn-success btn-sm">Crear Anuncio</a></h1>
    <legend><h3>Lista de Anuncios</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
        <li class="active">Lista de Anuncios</li>
    </ul>
	<table class="table table-striped table-hover table-responsive">
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Estatus</th>  
        <th>Contenido</th>
        <th>Acciones</th>
    </tr>
    <?php $cont = 0;?>
    @foreach ($anuncios as $anuncio)
    <tr>
        <td>{{ $cont += 1 }}</td>
        <td>{{ $anuncio->nombre }}</td>
        <td>{{ $anuncio->estatus }}</td>
        <td>{{ substr($anuncio->content, 0, 100) }}...</td>
        <td>
            <a href="{{ route('anuncios-show', $anuncio->id) }}" class="btn btn-info btn-xs">Ver </a>
            <a href="{{ route('anuncios.edit', $anuncio->id) }}" class="btn btn-warning btn-xs"> Editar</a>
        </td>
    </tr>
    @endforeach
  </table>
  {{ $anuncios->links() }}
@stop