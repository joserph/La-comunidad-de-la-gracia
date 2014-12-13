@extends('master.layout1')
@section ('title') Sliders | La Comunidad de la Gracia @stop
@section('content')
	
	<h1><a href="{{ route('slider.create') }}" class="btn btn-success btn-sm">Crear Slider</a></h1>
    <legend><h3>Lista de Sliders</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
        <li class="active">Lista de Sliders</li>
    </ul>
	<table class="table table-striped table-hover table-responsive">
    <tr>
        <th>#</th>
        <th>Título</th>
        <th>URL</th>
        <th>Tipo</th>  
        <th>Img</th>
        <th>Acciones</th>
    </tr>
    <?php $cont = 0;?>
    @foreach ($sliders as $slider)
    <tr>
        <td>{{ $cont += 1 }}</td>
        <td>{{ $slider->titulo }}</td>
        <td>{{ $slider->ruta }}</td>
        <td>{{ $slider->tipo }}</td>
        <td>
            @foreach($archivos as $archivo)
                @if($slider->f_ruta == $archivo)
                    <img src="{{ $archivo }}" class="img-responsive img-thumbnail" width="50" alt="{{ $slider->f_nombre }}">
                @endif
            @endforeach
        </td>
       
        <td>
            <a href="{{ route('slider.show', $slider->id) }}" class="btn btn-info btn-xs">Ver </a>
            <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-warning btn-xs"> Editar</a>
        </td>
    </tr>
    @endforeach
    </table>

<!--Carrusel-->
<div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
  <!-- Indicators -->
    <ol class="carousel-indicators">
    <?php $cont = -1;?>
    @foreach ($sliders as $slider)
        <li data-target="#carousel-example-generic" data-slide-to="{{ $cont += 1 }}" class="{{ $slider->tipo }}"></li>
    @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
    @foreach ($sliders as $slider)
    <div class="item {{ $slider->tipo }}">
        @foreach($archivos as $archivo)
            @if($slider->f_ruta == $archivo)
                <img src="{{ $archivo }}" class="img-responsive" alt="Cdlgracia_{{ $slider->f_nombre }}">
            @endif
        @endforeach
        <div class="carousel-caption">
            <div>
                <p>
                    <a class="btn btn-info" href="{{ $slider->ruta }}">Leer mas</a>
                </p>
            </div>
        </div>
    </div>
    @endforeach
    </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
<!-- Fin Carrusel-->
@stop