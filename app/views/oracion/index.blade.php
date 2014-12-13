@extends('master.layout3')
@section ('title') Peticiones de oración | La Comunidad de la Gracia @stop
@section('content')
	
    <legend><h3>Peticiones de Oración</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
        <li class="active">Peticiones de Oración</li>
    </ul>
	<table class="table table-striped table-hover table-responsive">
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Petición</th>
        <th>Fecha</th>
        <th>Acciones</th>
    </tr>
    @foreach ($oraciones as $oracion)
    <tr>
        <td>{{ $oracion->nombre }}</td>
        <td>{{ $oracion->email }}</td>
        <td>{{ substr($oracion->peticion, 0, 50) }}...</td>
        <td>{{ date("d/m/Y", strtotime($oracion->created_at)) }}</td>
        <td>
            <a href="{{ route('oracion.show', $oracion->id) }}" class="btn btn-info btn-xs">Ver </a>
            <a href="{{ route('oracion.edit', $oracion->id) }}" class="btn btn-warning btn-xs"> Editar</a>
        </td>
    </tr>
    @endforeach
    </table>    
    {{ $oraciones->links() }}  

@stop