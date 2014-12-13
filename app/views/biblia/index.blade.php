@extends('master.layout1')
@section ('title') Versículos | La Comunidad de la Gracia @stop
@section('content')
	
	<h1><a href="{{ route('biblia.create') }}" class="btn btn-success btn-sm">Crear Versículo</a></h1>
    <legend><h3>Lista de Versículos</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
        <li class="active">Lista de Versículo</li>
    </ul>
    <?php
    $total = DB::table('biblia')->count();
    $porcentaje = ($total*100)/31103;
    ?>
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="{{ number_format($porcentaje,2,",",".") }}" aria-valuemin="0" aria-valuemax="31103" style="width: {{ number_format($porcentaje,0,",",".") }}%;">
            {{ number_format($porcentaje,2,",",".") }}%
        </div>
    </div>
    <div class="progress progress-striped active">
        <div class="progress-bar" aria-valuenow="{{ number_format($porcentaje,2,",",".") }}" aria-valuemin="0" aria-valuemax="31103" style="width: {{ number_format($porcentaje,0,",",".") }}%;">{{ number_format($porcentaje,2,",",".") }}%</div>
    </div>
	<table class="table table-striped table-hover table-responsive">
    <tr>
        <th>#</th>
        <th>Libro</th>
        <th>Capitulo</th>  
        <th>Versiculo</th>
        <th>Contenido</th>
        <th>Acciones</th>
    </tr>
    <?php $cont = 0;?>
    @foreach ($biblia as $versos)
    <tr>
        <td>{{ $cont += 1 }}</td>
        <td>{{ $versos->libro }}</td>
        <td>{{ $versos->capitulo }}</td>
        <td>{{ $versos->versiculo }}</td>
        <td>{{ substr($versos->content, 0, 50) }}...</td>
        <td>
            <a href="{{ route('biblia-show', $versos->id) }}" class="btn btn-info btn-xs">Ver </a>
            <a href="{{ route('biblia.edit', $versos->id) }}" class="btn btn-warning btn-xs"> Editar</a>
        </td>

    </tr>
    @endforeach
  </table>
  {{ $biblia->links() }}
@stop