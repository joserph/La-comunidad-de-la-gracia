@extends('master.layout1')

<?php
    if ($anuncios->exists):
        $form_data = array('route' => array('anuncios.update', $anuncios->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'anuncios.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;
?>
@section ('title') {{ $action }} anuncio | La Comunidad de la Gracia @stop
@section('content')
  
	{{ Form::model($anuncios, $form_data, array('role' => 'form')) }}
  <legend><h3 class="form-signin-heading">{{ $action }} Anuncio</h3></legend>
  <ul class="breadcrumb">
      <li><a href="{{ URL::route('home') }}">Inicio</a></li>
      <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
      <li class="active">{{ $action }} Anuncio</li>
  </ul>
  @include ('admin/errors', array('errors' => $errors))

    @if($action == "Crear")
      <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
      <input type="hidden" name="update_user" value="{{ Auth::user()->id }}">
    @else
      <input type="hidden" name="update_user" value="{{ Auth::user()->id }}">
    @endif
    
    {{ Form::label('nombre', 'Nombre:') }} 
    {{ Form::text('nombre', null, array('class' => 'form-control', 'placeholder' =>'Nombre del anuncio', 'autofocus'=>'autofocus')) }} 
    {{ Form::label('fecha', 'Fecha:') }} 
    <input type="date" name="fecha" class="form-control" placeholder="dd/mm/aaaa" value="{{ $anuncios->fecha }}">
    {{ Form::label('hora', 'Hora:') }}
    <input type="time" name="hora" placeholder="00:00 a.m." class="form-control" value="{{ $anuncios->hora }}">
    {{ Form::label('estatus', 'Estatus:') }} 
    {{ Form::select('estatus', array(
      '' => 'Select',
      'publico' => 'Público',
      'privado' => 'Privado'
      ), null, ['class' => 'form-control'])
    }} 
    {{ Form::label('content', 'Contenido:') }} 
    {{ Form::textarea('content', null, array('class' => 'form-control', 'id' => 'edit')) }} 
    
    <br>
    @if($action == 'Crear')
      {{ Form::button($action.' anuncio', array('type' => 'submit', 'class' => 'btn btn-success')) }}
    @else 
      {{ Form::button($action.' anuncio', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
    @endif
   
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($anuncios, array('route' => array('anuncios.destroy', $anuncios->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar anuncio', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop