@extends('master.layout1')
@section ('title') Tag predicadores | La Comunidad de la Gracia @stop
@section('content')
	
	<h1><a href="{{ route('predicadores.create') }}" class="btn btn-success btn-sm">Crear Predicador</a></h1>
    <legend><h3>Lista de Predicadores</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
        <li class="active">Lista de Predicadores</li>
    </ul>
	<table class="table table-striped table-hover table-responsive">
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>URL</th>  
        <th>Acciones</th>
    </tr>
    <?php $cont = 0;?>
    @foreach ($predicadores as $predicador)
    <tr>
        <td>{{ $cont += 1 }}</td>
        <td>{{ $predicador->nombre }}</td>
        <td>{{ $predicador->url }}</td>
        <td>
            <a href="{{ URL::route('predicadores-show', $predicador->url) }}" class="btn btn-info btn-xs">Ver </a>
            <a href="{{ route('predicadores.edit', $predicador->id) }}" class="btn btn-warning btn-xs"> Editar</a>
        </td>
    </tr>
    @endforeach
    </table>
    {{ $predicadores->links() }}
@stop