@extends('master.layout3')

<?php
    if ($comentarios->exists):
        $form_data = array('route' => array('comentarios.update', $comentarios->id), 'method' => 'PATCH');
        $action    = 'Editar';      
    endif;
?>

@section ('title') {{ $action }} comentario | La Comunidad de la Gracia @stop
@section('content')

	{{ Form::model($comentarios, $form_data, array('role' => 'form')) }}
    <legend><h3 class="form-signin-heading">{{ $action }} Comentario</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li>{{ HTML::link('comentarios', 'Lista de Comentarios') }}</li>
        <li class="active">{{ $action }} Comentarios</li>
    </ul>
    @include ('admin/errors', array('errors' => $errors))
    
    {{ Form::label('nombre', 'Nombre:') }} 
    {{ Form::text('nombre', null, array('class' => 'form-control')) }}
    {{ Form::label('comentario', 'Comentario:') }} 
    {{ Form::textarea('comentario', null, array('class' => 'form-control')) }}
    <br>  
    {{ Form::button($action.' comentario', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
   
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($comentarios, array('route' => array('comentarios.destroy', $comentarios->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar comentario', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop