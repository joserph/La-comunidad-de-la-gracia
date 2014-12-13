@extends('master.layout1')

<?php
    if ($predica->exists):
        $form_data = array('route' => array('predicas.update', $predica->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'predicas.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;
?>
@section ('title') {{ $action }} predica | La Comunidad de la Gracia @stop
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

      alert("Url automatica.");
     $('#url2').val(barra2);
    });
  });
</script>
<script>
  function desactivar() {
  if($("#casilla:checked").val()==1) {
      $("#mes").attr('disabled', 'disabled');
  }else{
    $("#mes").removeAttr("disabled");
    }
    if($("#casilla1:checked").val()==1) {
      $("#anio").attr('disabled', 'disabled');
    }else{
      $("#anio").removeAttr("disabled");
      }
      if($("#casilla2:checked").val()==1) {
      $("#predicador").attr('disabled', 'disabled');
  }
  else {
      $("#predicador").removeAttr("disabled");
    }
    if($("#casilla3:checked").val()==1) {
      $("#url2").attr('readonly', 'readonly');
  }
  else {
      $("#url2").removeAttr("readonly");
    }
    if($("#casilla4:checked").val()==1) {
      $("#estatus").attr('disabled', 'disabled');
  }
  else {
      $("#estatus").removeAttr("disabled");
    }
  }
</script>
   
	{{ Form::model($predica, $form_data, array('role' => 'form')) }}
  <legend><h3 class="form-signin-heading">{{ $action }} Predica</h3></legend>
  <ul class="breadcrumb">
      <li><a href="{{ URL::route('home') }}">Inicio</a></li>
      <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
      <li class="active">{{ $action }} Predica</li>
  </ul>
	@include ('admin/errors', array('errors' => $errors))
    
    <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    {{ Form::label('title', 'Title:') }} 
    {{ Form::text('title', null, array('class' => 'form-control', 'id' => 'title1')) }}
    {{ Form::label('url', 'Url:') }}
    {{ Form::text('url', null, array('class' => 'form-control', 'id' => 'url2', 'readonly')) }} 
    <div class="checkbox">
      <label>
        <input type="checkbox" id="casilla3" value="1" onclick="desactivar()" checked="checked"> Colocar ruta manualmente 
      </label>
    </div>
    {{ Form::label('fecha', 'Fecha de predica:') }} 
      <input type="date" name="fecha" value="{{ $predica->fecha }}" placeholder="" class="form-control">
    {{ Form::label('mes', 'Mes:') }}
    <select class="form-control" id="mes" name="mes" required disabled>
      @foreach($fechas as $fecha)
        @if($fecha->tipo == "mes")
          <option value="{{ $fecha->id }}">{{ $fecha->fecha }}</option> 
        @endif
      @endforeach
    </select>
      <div class="checkbox">
        <label>
          <input type="checkbox" id="casilla" value="1" onclick="desactivar()" checked="checked"> Editar mes
        </label> 
      </div>
      {{ Form::label('anio', 'Año:') }}
      <select class="form-control" id="anio" name="anio" required disabled>
      @foreach($fechas as $fecha)
        @if($fecha->tipo == "año")
          <option value="{{ $fecha->id }}">{{ $fecha->fecha }}</option> 
        @endif
      @endforeach 
    </select>
    <div class="checkbox">
      <label>
        <input type="checkbox" id="casilla1" value="1" onclick="desactivar()" checked="checked"> Editar año
      </label> 
    </div>
    {{ Form::label('predicador', 'Predicador:') }}
    <select class="form-control" id="predicador" name="predicador" required disabled>
      @foreach($predicadores as $predicador)
        @if($predicador->tipo == 'predicador')
          <option value="{{ $predicador->id }}">{{ $predicador->nombre }}</option> 
        @endif
      @endforeach 
    </select>
    <div class="checkbox">
       <label>
        <input type="checkbox" id="casilla2" value="1" onclick="desactivar()" checked="checked"> Editar predicador
      </label> 
    </div>
    {{ Form::label('content', 'Content:') }}
    {{ Form::textarea('content', null, array('class' => 'form-control', 'id' => 'edit')) }}
    <script>
        $(function() {
            $('#edit').editable({inlineMode: false})
        });
    </script>
    {{ Form::label('audio', 'Audio:') }}
    {{ Form::textarea('audio', null, array('class' => 'form-control')) }}
    {{ Form::label('estatus', 'Estatus:') }}
    {{ Form::select('estatus', array(
      '' => 'Select',
      'publicado' => 'Publicado',
      'menu' => 'Solo menú'
      ), null, ['class' => 'form-control'])
    }}
    {{ Form::label('comentario', 'Habilitar comentarios:') }} 
    <div class="radio">
      <label>
        <input type="radio" name="comentario" id="optionsRadios1" value="no">
        No
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="comentario" id="optionsRadios2" value="si" checked>
        Si
      </label>
    </div>
    <br>       
    {{ Form::button($action.' predica', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
   
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($predica, array('route' => array('predicas.destroy', $predica->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar predica', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop