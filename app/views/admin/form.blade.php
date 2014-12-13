@extends('master.layout3')

<?php
    if ($user->exists):
        $form_data = array('route' => array('admin.update', $user->id), 'method' => 'PATCH');
        $action    = 'Editar';      
    endif;
?>
@section ('title') {{ $action }} usuario | La Comunidad de la Gracia @stop
@section('content')

  {{ Form::model($user, $form_data, array('role' => 'form')) }}
    <legend><h3 class="form-signin-heading">{{ $action }} Usuario</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li>{{ HTML::link('admin', 'Administración de Usuarios') }}</li>
        <li class="active">{{ $action }} Usuario</li>
    </ul>
    @include ('admin/errors', array('errors' => $errors))
    {{ Form::label('nombre', 'Nombre:') }} 
    {{ Form::text('nombre', null, array('class' => 'form-control')) }}
    {{ Form::label('username', 'Username:') }} 
    {{ Form::text('username', null, array('class' => 'form-control')) }}
    {{ Form::label('email', 'Email:') }} 
    {{ Form::text('email', null, array('class' => 'form-control')) }}
    {{ Form::label('ubicacion', 'Ubicacion:') }} 
    {{ Form::text('ubicacion', null, array('class' => 'form-control', 'placeholder' => 'Ej. Madrid - España')) }}
    {{ Form::label('id_rol', 'Id_rol:') }} 
    {{ Form::select('id_rol', array(
      '2' => 'Usuario',
      '1' => 'Editor',
      '0' => 'Administrador'
      ), null, ['class' => 'form-control']) 
    }}
    <br>
    {{ Form::button($action.' usuario', array('type' => 'submit', 'class' => ' btn btn-warning')) }}
   
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($user, array('route' => array('admin.destroy', $user->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar usuario', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop