@extends('master.layout3')
@section ('title') Administrador de contenido | La Comunidad de la Gracia @stop
@section('content')
	
<legend><h3>Administrador de Contenido</h3></legend>
<ul class="breadcrumb">
    <li><a href="{{ URL::route('home') }}">Inicio</a></li>
    <li class="active">Administrador de Contenido</li>
</ul>

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">
        <span class="glyphicon glyphicon-cog"></span> Administrador de Contenido
        </h3>       
    </div>

    <div class="panel-body">
    <div class="row">
        <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Predicas</h3>
            </div>
            <div class="panel-body">      
                <blockquote class="pull-right">
                    <p>Utilice <cite title="Source Title">predicas</cite> para contenido que dependa audio, como pueden ser entradas de blogs.</p>                             
                </blockquote>                                           
            </div>
            <blockquote>
                <p><a href="{{ route('predicas.create') }}" class="btn btn-success">Crear predica</a></p>
                <a href="{{ route('predicas.index') }}" class="btn btn-info">Ver predicas <span class="badge">{{ $predicas }}</span></a>
            </blockquote>
        </div>
        </div>
        <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Artículo</h3>
            </div>
            <div class="panel-body">      
                <blockquote class="pull-right">
                    <p>Utilice <cite title="Source Title">artículo</cite> para contenido que dependa de información de la iglesia, como pueden ser noticias, artículos o entradas de blogs.</p>                             
                </blockquote>                                           
            </div>
            <blockquote>
                <p><a href="{{ route('post.create') }}" class="btn btn-success">Crear artículo</a></p>
                <a href="{{ route('post.index') }}" class="btn btn-info">Ver artículos <span class="badge">{{ $posts }}</span></a>
            </blockquote>
        </div>
        </div>
        <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Tag fechas</h3>
            </div>
            <div class="panel-body">      
                <blockquote class="pull-right">
                    <p>Utilice <cite title="Source Title">tag fechas</cite> para gestionar el etiquetado, categorización y clasificación de su contenido por fecha.</p>                             
                </blockquote>                                           
            </div>
            <blockquote>
                <p><a href="{{ route('fechas.create') }}" class="btn btn-success">Crear fecha</a></p>
                <a href="{{ route('fechas.index') }}" class="btn btn-info">Ver fechas <span class="badge">{{ $mes }}</span></a>
            </blockquote>
        </div>
        </div>
        <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Tag predicadores</h3>
            </div>
            <div class="panel-body">      
                <blockquote class="pull-right">
                    <p>Utilice <cite title="Source Title">tag predicadores</cite> para gestionar el etiquetado de los expositores de cada predica.</p>                             
                </blockquote>                                           
            </div>
            <blockquote>
                <p><a href="{{ route('predicadores.create') }}" class="btn btn-success">Crear predicador</a></p>
                <a href="{{ route('predicadores.index') }}" class="btn btn-info">Ver predicadores <span class="badge">{{ $predicadores }}</span></a>
            </blockquote>
        </div>
        </div>
        <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Anuncios</h3>
            </div>
            <div class="panel-body">      
                <blockquote class="pull-right">
                    <p>Utilice <cite title="Source Title">anuncios</cite> para gestionar las noticias y actividades de la semana.</p>                             
                </blockquote>                                           
            </div>
            <blockquote>
                <p><a href="{{ route('anuncios.create') }}" class="btn btn-success">Crear anuncio</a></p>
                <a href="{{ route('anuncios.index') }}" class="btn btn-info">Ver anuncios <span class="badge">{{ $anuncios }}</span></a>
            </blockquote>
        </div>
        </div>
        <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Versículos</h3>
            </div>
            <div class="panel-body">      
                <blockquote class="pull-right">
                    <p>Utilice <cite title="Source Title">versículos</cite> para gestionar todos los versículos de la biblia.</p>                             
                </blockquote>                                           
            </div>
            <blockquote>
                <p><a href="{{ route('biblia.create') }}" class="btn btn-success">Crear versículos</a></p>
                <a href="{{ route('biblia.index') }}" class="btn btn-info">Ver versículos <span class="badge">{{ $biblia }}</span></a>
            </blockquote>
        </div>
        </div>
        <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Tareas</h3>
            </div>
            <div class="panel-body">      
                <blockquote class="pull-right">
                    <p>Utilice <cite title="Source Title">tareas</cite> para gestionar el versículo del día por semana.</p>                             
                </blockquote>                                           
            </div>
            <blockquote>
                <p><a href="{{ route('cronjobs.create') }}" class="btn btn-success">Crear tarea</a></p>
                <a href="{{ route('cronjobs.index') }}" class="btn btn-info">Ver tarea <span class="badge">{{ $cronjobs }}</span></a>
            </blockquote>
        </div>
        </div>
        <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Slider</h3>
            </div>
            <div class="panel-body">      
                <blockquote class="pull-right">
                    <p>Utilice <cite title="Source Title">imagenes</cite> para gestionar el versículo del día por semana.</p>                             
                </blockquote>                                           
            </div>
            <blockquote>
                <p><a href="{{ route('slider.create') }}" class="btn btn-success">Crear slider</a></p>
                <a href="{{ route('slider.index') }}" class="btn btn-info">Ver slider <span class="badge">{{ $sliders }}</span></a>
            </blockquote>
        </div>
        </div>
    @if(Auth::check() && (Auth::user()->id_rol == 0))
        <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Comentarios</h3>
            </div>
            <div class="panel-body">      
                <blockquote class="pull-right">
                    <p>Utilice <cite title="Source Title">comentarios</cite> para gestionar los comentarios de los usuarios.</p>                             
                </blockquote>                                           
            </div>
            <blockquote>
                <a href="{{ route('comentarios') }}" class="btn btn-info">Ver comentarios <span class="badge">{{ $comentarios }}</span></a>
            </blockquote>
        </div>
        </div>

        <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Oración</h3>
            </div>
            <div class="panel-body">      
                <blockquote class="pull-right">
                    <p>Utilice <cite title="Source Title">oración</cite> para gestionar las peticiones de oración.</p>                             
                </blockquote>                                           
            </div>
            <blockquote>
                <a href="{{ route('oracion.index') }}" class="btn btn-info">Ver peticiones <span class="badge">{{ $oraciones }}</span></a>
            </blockquote>
        </div>
        </div>
    @endif
    </div> 
    </div>
</div>
@stop