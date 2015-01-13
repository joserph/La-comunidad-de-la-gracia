@extends('master.layout1')

<?php
    if($user):
        $form_data = array('route' => array('user.update', $user->id), 'method' => 'PATCH');
        $action    = 'Editar';      
    endif;
?>
@section ('title') {{ $action }} usuario | La Comunidad de la Gracia @stop
@section('content')

  {{ Form::model($user, $form_data, array('role' => 'form')) }}
    <legend><h3 class="form-signin-heading">{{ $action }} Usuario</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li><a href="{{ route('user.show', Auth::user()->username) }}">Perfil de {{ $user->username }} </a></li>
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
    {{ Form::label('sexo', 'Sexo:') }}
    {{ Form::select('sexo', array(
      '' => 'Select',
      'Mujer' => 'Mujer',
      'Hombre' => 'Hombre'
      ), null, ['class' => 'form-control'])
    }}
    
    <br>
    {{ Form::button($action.' usuario', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
   
  {{ Form::close() }}
  <br>
  <p>Puedes eliminar tu cuenta en cualquier momento. Pero esta acción es irreversible.</p>
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($user, array('route' => array('user.destroy', $user->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Entiendo, elimina mi cuenta', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop