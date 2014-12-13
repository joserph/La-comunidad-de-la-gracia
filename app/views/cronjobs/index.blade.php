@extends('master.layout1')
@section ('title') Cron Jobs | La Comunidad de la Gracia @stop
@section('content')
	
	<h1><a href="{{ route('cronjobs.create') }}" class="btn btn-success btn-sm">Crear Cron Job</a></h1>

    <legend><h3>Lista de Cron Jobs</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
        <li class="active">Lista de Cron Jobs</li>
    </ul>
    
    @foreach ($cronjobs as $cronjob)
        @if($cronjob->dia == 'Lunes')
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Lunes</h3>
                </div>
                <div class="panel-body">
                    @foreach($biblia as $verso)
                        @if($verso->id == $cronjob->id_tarea)
                            <blockquote class="pull-right">
                                <p>{{ $verso->content }}</p>
                                <small>
                                    <cite title="Source Title">
                                        <strong>
                                            {{ $verso->libro }} {{ $verso->capitulo }}:{{ $verso->versiculo }}
                                        </strong>                                        
                                    </cite>
                                </small>                                
                            </blockquote>                            
                        @endif
                    @endforeach                    
                </div>
                <blockquote>
                    <a href="{{ route('cronjobs.show', $cronjob->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('cronjobs.edit', $cronjob->id) }}" class="btn btn-warning">Editar</a>
                </blockquote>
            </div>
        @elseif($cronjob->dia == 'Martes')
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Martes</h3>
                </div>
                <div class="panel-body">
                    @foreach($biblia as $verso)
                        @if($verso->id == $cronjob->id_tarea)
                            <blockquote class="pull-right">
                                <p>{{ $verso->content }}</p>
                                <small>
                                    <cite title="Source Title">
                                        <strong>
                                            {{ $verso->libro }} {{ $verso->capitulo }}:{{ $verso->versiculo }}
                                        </strong>
                                    </cite>
                                </small>
                            </blockquote>                                                       
                        @endif
                    @endforeach                    
                </div>
                <blockquote>
                    <a href="{{ route('cronjobs.show', $cronjob->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('cronjobs.edit', $cronjob->id) }}" class="btn btn-warning">Editar</a>
                </blockquote> 
            </div>
        @elseif($cronjob->dia == 'Miercoles')
        <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Miercoles</h3>
                </div>
                <div class="panel-body">
                    @foreach($biblia as $verso)
                        @if($verso->id == $cronjob->id_tarea)
                            <blockquote class="pull-right">
                                <p>{{ $verso->content }}</p>
                                <small>
                                    <cite title="Source Title">
                                        <strong>
                                            {{ $verso->libro }} {{ $verso->capitulo }}:{{ $verso->versiculo }}
                                        </strong>
                                    </cite>
                                </small>
                            </blockquote>                            
                        @endif
                    @endforeach                    
                </div>
                <blockquote>
                    <a href="{{ route('cronjobs.show', $cronjob->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('cronjobs.edit', $cronjob->id) }}" class="btn btn-warning">Editar</a>
                </blockquote>
            </div>
        @elseif($cronjob->dia == 'Jueves')
        <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Jueves</h3>
                </div>
                <div class="panel-body">
                    @foreach($biblia as $verso)
                        @if($verso->id == $cronjob->id_tarea)
                            <blockquote class="pull-right">
                                <p>{{ $verso->content }}</p>
                                <small>
                                    <cite title="Source Title">
                                        <strong>
                                            {{ $verso->libro }} {{ $verso->capitulo }}:{{ $verso->versiculo }}
                                        </strong>
                                    </cite>
                                </small>
                            </blockquote>                            
                        @endif
                    @endforeach                    
                </div>
                <blockquote>
                    <a href="{{ route('cronjobs.show', $cronjob->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('cronjobs.edit', $cronjob->id) }}" class="btn btn-warning">Editar</a>
                </blockquote>
            </div>
        @elseif($cronjob->dia == 'Viernes')
        <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Viernes</h3>
                </div>
                <div class="panel-body">
                    @foreach($biblia as $verso)
                        @if($verso->id == $cronjob->id_tarea)
                            <blockquote class="pull-right">
                                <p>{{ $verso->content }}</p>
                                <small>
                                    <cite title="Source Title">
                                        <strong>
                                            {{ $verso->libro }} {{ $verso->capitulo }}:{{ $verso->versiculo }}
                                        </strong>
                                    </cite>
                                </small>
                            </blockquote>                            
                        @endif
                    @endforeach                    
                </div>
                <blockquote>
                    <a href="{{ route('cronjobs.show', $cronjob->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('cronjobs.edit', $cronjob->id) }}" class="btn btn-warning">Editar</a>
                </blockquote>
            </div>
        @elseif($cronjob->dia == 'Sabado')
        <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Sabado</h3>
                </div>
                <div class="panel-body">
                    @foreach($biblia as $verso)
                        @if($verso->id == $cronjob->id_tarea)
                            <blockquote class="pull-right">
                                <p>{{ $verso->content }}</p>
                                <small>
                                    <cite title="Source Title">
                                        <strong>
                                            {{ $verso->libro }} {{ $verso->capitulo }}:{{ $verso->versiculo }}
                                        </strong>
                                    </cite>
                                </small>
                            </blockquote>                            
                        @endif
                    @endforeach                    
                </div>
                <blockquote>
                    <a href="{{ route('cronjobs.show', $cronjob->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('cronjobs.edit', $cronjob->id) }}" class="btn btn-warning">Editar</a>
                </blockquote>
            </div>
        @elseif($cronjob->dia == 'Domingo')
        <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Domingo</h3>
                </div>
                <div class="panel-body">
                    @foreach($biblia as $verso)
                        @if($verso->id == $cronjob->id_tarea)
                            <blockquote class="pull-right">
                                <p>{{ $verso->content }}</p>
                                <small>
                                    <cite title="Source Title">
                                        <strong>
                                            {{ $verso->libro }} {{ $verso->capitulo }}:{{ $verso->versiculo }}
                                        </strong>
                                    </cite>
                                </small>
                            </blockquote>                            
                        @endif
                    @endforeach                    
                </div>
                <blockquote>
                    <a href="{{ route('cronjobs.show', $cronjob->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('cronjobs.edit', $cronjob->id) }}" class="btn btn-warning">Editar</a>
                </blockquote>
            </div>
        @endif

    @endforeach
@stop