@extends('master.layout3')

<?php
    if ($oraciones->exists):
        $form_data = array('route' => array('oracion.update', $oraciones->id), 'method' => 'PATCH');
        $action    = 'Editar';      
    endif;
?>

@section ('title') {{ $action }} petición | La Comunidad de la Gracia @stop
@section('content')

	{{ Form::model($oraciones, $form_data, array('role' => 'form')) }}
    <legend><h3 class="form-signin-heading">{{ $action }} Petición</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
        <li>{{ HTML::link('oracion', 'Peticiones de Oración') }}</li>
        <li class="active">{{ $action }} oraciones</li>
    </ul>
    @include ('admin/errors', array('errors' => $errors))
    
    {{ Form::label('nombre', 'Nombre:') }} 
    {{ Form::text('nombre', null, array('class' => 'form-control')) }}
    {{ Form::label('email', 'Email:') }} 
    {{ Form::text('email', null, array('class' => 'form-control')) }}
    {{ Form::label('peticion', 'Petición:') }} 
    {{ Form::textarea('peticion', null, array('class' => 'form-control')) }}
    <br>  
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($oraciones, array('route' => array('oracion.destroy', $oraciones->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar petición', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop