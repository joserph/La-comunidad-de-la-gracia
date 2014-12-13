@extends('master.layout1')

<?php
    if ($fechas->exists):
        $form_data = array('route' => array('fechas.update', $fechas->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'fechas.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;
?>
@section ('title') {{ $action }} tag fecha | La Comunidad de la Gracia @stop
@section('content')

<script>
  $(document).ready(function(){
    
    $("#title1").blur(function(){
      url = $('#title1').val();
      guion = url.replace(/ /g, "-");
      enie = guion.replace(/ñ/g, "n");
      a = enie.replace(/á/g, "a");
      aa = a.replace(/Á/g, "a");
      e = aa.replace(/é/g, "e");
      ee = e.replace(/É/g, "e");
      i = ee.replace(/í/g, "i");
      ii = i.replace(/Í/g, "i");
      o = ii.replace(/ó/g, "o");
      oo = o.replace(/Ó/g, "o");
      u = oo.replace(/ú/g, "u");
      uu = u.replace(/Ú/g, "u");
      ba = "/";
      barra = uu.replace(ba, "-");
      barra2 = barra.replace(ba, "-").toLowerCase();

      
     $('#url2').val(barra2);
    });
  });
</script>

	{{ Form::model($fechas, $form_data, array('role' => 'form')) }}
  <legend><h3 class="form-signin-heading">{{ $action }} Fecha</h3></legend>
  <ul class="breadcrumb">
      <li><a href="{{ URL::route('home') }}">Inicio</a></li>
      <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
      <li class="active">{{ $action }} Fecha</li>
  </ul>
  @include ('admin/errors', array('errors' => $errors))

    @if($action == "Crear")
      <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
      <input type="hidden" name="update_user" value="{{ Auth::user()->id }}">
    @else
      <input type="hidden" name="update_user" value="{{ Auth::user()->id }}">
    @endif
    {{ Form::label('fecha', 'Fecha:') }} 
    {{ Form::text('fecha', null, array('class' => 'form-control', 'id' => 'title1', 'placeholder' =>'Título de la fecha', 'autofocus'=>'autofocus')) }} 
    {{ Form::label('url', 'Url:') }} 
    {{ Form::text('url', null, array('class' => 'form-control', 'id' => 'url2', 'placeholder' =>'Ruta de la fecha')) }} 
    {{ Form::label('tipo', 'Tipo:') }}
    {{ Form::select('tipo', array(
      '' => 'Select',
      'mes' => 'Mes',
      'año' => 'Año'
      ), null, ['class' => 'form-control'])
    }} 
    <br>
    @if($action == 'Crear')
      {{ Form::button($action.' fecha', array('type' => 'submit', 'class' => 'btn btn-success')) }}
    @else 
      {{ Form::button($action.' fecha', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
    @endif
   
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($fechas, array('route' => array('fechas.destroy', $fechas->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar fecha', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop