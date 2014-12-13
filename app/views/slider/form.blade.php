@extends('master.layout1')

<?php
  if ($sliders->exists):
      $form_data = array('route' => array('slider.update', $sliders->id), 'method' => 'PATCH', 'files' => true);
      $action    = 'Editar';
  else:
      $form_data = array('route' => 'slider.store', 'method' => 'POST', 'files' => true);
      $action    = 'Crear';        
  endif;
?>
@section ('title') {{ $action }} slider | La Comunidad de la Gracia @stop
@section('content')

  {{ Form::model($sliders, $form_data, array('role' => 'form')) }}
    <legend><h3 class="form-signin-heading">{{ $action }} Slider</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
        <li class="active">{{ $action }} Slider</li>
    </ul>
    @include ('admin/errors', array('errors' => $errors))
    @if($action == "Crear")
      <input type="hidden" name="id_user" value="{{ Auth:: user()->id }}">
      <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    @else 
      <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    @endif

    {{ Form::label('titulo', 'Titulo:') }} 
    {{ Form::text('titulo', null, array('class' => 'form-control', 'id' => 'title1', 'placeholder' =>'Título del slider')) }}
    {{ Form::label('ruta', 'Ruta:') }} 
    {{ Form::text('ruta', null, array('class' => 'form-control', 'id' => 'url2', 'placeholder' =>'Ruta del artículo')) }}
    {{ Form::label('content', 'Contenido:') }} 
    {{ Form::textarea('content', null, array('class' => 'form-control', 'id' => 'editor1')) }}
    {{ Form::label('file', 'File:') }} 
    {{ Form::file('file') }}
    {{ Form::label('tipo', 'Tipo:') }} 
    {{ Form::select('tipo', array(
      '' => 'Normal',
      'active' => 'Active'
      ), null, ['class' => 'form-control']) 
    }}
    <br>
    @if($action == 'Crear')      
      {{ Form::button($action.' slider', array('type' => 'submit', 'class' => 'btn btn-success')) }}
    @else
      {{ Form::button($action.' slider', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
    @endif
   
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($sliders, array('route' => array('slider.destroy', $sliders->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar slider', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop