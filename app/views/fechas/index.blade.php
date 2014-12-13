@extends('master.layout1')
@section ('title') Tag fechas | La Comunidad de la Gracia @stop
@section('content')
	
	<h1><a href="{{ route('fechas.create') }}" class="btn btn-success btn-sm">Crear Fecha</a></h1>
    <legend><h3>Lista de Fechas</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
        <li class="active">Lista de Fechas</li>
    </ul>
	<table class="table table-striped table-hover table-responsive">
    <tr>
        <th>#</th>
        <th>Fecha</th>
        <th>URL</th>  
        <th>Tipo</th>
        <th>Acciones</th>
    </tr>
    <?php $cont = 0;?>
    @foreach ($fechas as $fecha)
    <tr>
        <td>{{ $cont += 1 }}</td>
        <td>{{ $fecha->fecha }}</td>
        <td>{{ $fecha->url }}</td>
        <td class="text-uppercase">{{ $fecha->tipo }}</td>
        <td>
            <a href="{{ URL::route('fechas-show', $fecha->url) }}" class="btn btn-info btn-xs">Ver </a>
            <a href="{{ route('fechas.edit', $fecha->id) }}" class="btn btn-warning btn-xs"> Editar</a>
        </td>

    </tr>
    @endforeach
    </table>
    {{ $fechas->links() }}
@stop