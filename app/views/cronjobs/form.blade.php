@extends('master.layout1')

<?php
    if ($cronjobs->exists):
        $form_data = array('route' => array('cronjobs.update', $cronjobs->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'cronjobs.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;
?>
@section ('title') {{ $action }} cron Job | La Comunidad de la Gracia @stop
@section('content')

	{{ Form::model($cronjobs, $form_data, array('role' => 'form')) }}

  <legend><h3 class="form-signin-heading">{{ $action }} Cron Job</h3></legend>
  <ul class="breadcrumb">
      <li><a href="{{ URL::route('home') }}">Inicio</a></li>
      <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
      <li class="active">{{ $action }} Cron Job</li>
  </ul>
  @include ('admin/errors', array('errors' => $errors))

    @if($action == "Crear")
      <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
      <input type="hidden" name="update_user" value="{{ Auth::user()->id }}">
    @else
      <input type="hidden" name="update_user" value="{{ Auth::user()->id }}">
    @endif

    {{ Form::label('tipo', 'Tipo:') }} 
    {{ Form::select('tipo', array(
      '' => 'Select',
      'Actualizar' => 'Actualizar',
      'Borrar' => 'Borrar'     
      ), null, ['class' => 'form-control']) 
    }} 
    {{ Form::label('dia', 'Día:') }} 
    {{ Form::select('dia', array(
      '' => 'Select',
      'Lunes' => 'Lunes',
      'Martes' => 'Martes',
      'Miercoles' => 'Miercoles',
      'Jueves' => 'Jueves',
      'Viernes' => 'Viernes',
      'Sabado' => 'Sabado',
      'Domingo' => 'Domingo'       
      ), null, ['class' => 'form-control']) 
    }} 
    {{ Form::label('capitulo', 'Capítulo:') }} 
    <select name="id_tarea" id="" class="form-control">
      <?php $cont = 0;?>
      @foreach($versiculo as $verso)
        <?php if($cont == 0){ ?>
        <option value="{{ $verso->id }}">{{ $verso->libro }} {{ $verso->capitulo }}:{{ $verso->versiculo }}</option>
        <?php } $cont += 1; ?>
      @endforeach
    </select> 
    <br>
    @if($action == 'Crear')
      {{ Form::button($action.' cron job', array('type' => 'submit', 'class' => 'btn btn-success')) }}
    @else
      {{ Form::button($action.' cron job', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
    @endif
   
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($cronjobs, array('route' => array('cronjobs.destroy', $cronjobs->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar cron job', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop