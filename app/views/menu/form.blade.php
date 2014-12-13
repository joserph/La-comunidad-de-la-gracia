@extends('master.layout3')

<?php
    if ($menus->exists):
        $form_data = array('route' => array('menu.update', $menus->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'menu.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;
?>
@section ('title') {{ $action }} menú | La Comunidad de la Gracia @stop
@section('content')

<script>
  $(document).ready(function(){
      $("#estatus").blur(function(){
        valor = $('#estatus').val();
        if(valor != "publico")
        {
          $("#padre").hide();
          $("#padre1").hide();
        }else{
          $("#padre").show();
          $("#padre1").show();
        }
      });
  });
</script>

	{{ Form::model($menus, $form_data, array('role' => 'form')) }}
    <legend><h3 class="form-signin-heading">{{ $action }} Menú</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li>{{ HTML::link('menu', 'Configuración de Menú') }}</li>
        <li class="active">{{ $action }} Menú</li>
    </ul>
    @include ('admin/errors', array('errors' => $errors))
    @if($action == "Crear")
      <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
      <input type="hidden" name="update_user" value="{{ Auth::user()->id }}">
    @endif
    {{ Form::label('nombre', 'Nombre:') }} 
    {{ Form::text('nombre', null, array('class' => 'form-control', 'autofocus')) }}
    {{ Form::label('url', 'Ruta:') }} 
    {{ Form::text('url', null, array('class' => 'form-control')) }}
    {{ Form::label('estatus', 'Estatus:') }}
    {{ Form::select('estatus', array(
      '' => 'Select',
      'privado' => 'Privado',
      'publico' => 'Publico',
      'principal' => 'Principal'
      ), null, ['class' => 'form-control'])
    }}
    {{ Form::label('tipo', 'Tipo:') }} 
    {{ Form::select('tipo', array(
        '' => 'Select',
        'normal' => 'Normal',
        'expandido' => 'Expandido'
      ), null, ['class' => 'form-control']) 
    }}   
    <label for="padre" id="padre1">Padre:</label>
    <select class="form-control" id="padre" name="padre">
     <option value="-">Select</option>
      @foreach($padres as $menu)
          <option value="{{ $menu->id }}"> {{ $menu->nombre }} </option> 
      @endforeach 
    </select>
    {{ Form::label('peso', 'Peso:') }} 
    {{ Form::select('peso', array(
        '' => 'Select',
        '1' => '1',  
        '2' => '2',
        '3' => '3', 
        '4' => '4',
        '5' => '5', 
        '6' => '6',
        '7' => '7', 
        '8' => '8',
        '9' => '9', 
        '10' => '10',
        '11' => '11', 
        '12' => '12',
      ), null, ['class' => 'form-control']) 
    }} 
    {{ Form::label('cat', 'Cat:') }} 
    {{ Form::select('cat', array(
        '' => 'Select',
        'fecha' => 'Fecha',  
        'post' => 'Post'
      ), null, ['class' => 'form-control']) 
    }}  
    <br>
    {{ Form::button($action.' menú', array('type' => 'submit', 'class' => 'btn btn-success')) }}
   
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($menus, array('route' => array('menu.destroy', $menus->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar menú', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop