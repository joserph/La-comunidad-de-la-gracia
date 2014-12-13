@extends('master.layout1')

<?php
  if ($post->exists):
      $form_data = array('route' => array('post.update', $post->id), 'method' => 'PATCH', 'files' => true);
      $action    = 'Editar';
  else:
      $form_data = array('route' => 'post.store', 'method' => 'POST', 'files' => true);
      $action    = 'Crear';        
  endif;
?>
@section ('title') {{ $action }} artículo | La Comunidad de la Gracia @stop
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
  function desactivar()
  {
    if($("#casilla3:checked").val()==1) {
        $("#url2").attr('readonly', 'readonly');
  }
    else 
    {
      $("#url2").removeAttr("readonly");
    }
  }
</script>

	{{ Form::model($post, $form_data, array('role' => 'form', 'files' => true)) }}
    <legend><h3 class="form-signin-heading">{{ $action }} Artículo</h3></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
        <li class="active">{{ $action }} Artículo</li>
    </ul>
  	@include ('admin/errors', array('errors' => $errors))
    @if($action == "Crear")
      <input type="hidden" name="id_user" value="{{ Auth:: user()->id }}">
      <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
      <input type="hidden" name="tipo" value="post">
    @else 
      <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    @endif

    {{ Form::label('title', 'Title:') }} 
    {{ Form::text('title', null, array('class' => 'form-control', 'id' => 'title1', 'placeholder' =>'Título del artículo', 'autofocus'=>'autofocus')) }}
    {{ Form::label('url', 'Url:') }} 
    {{ Form::text('url', null, array('class' => 'form-control', 'id' => 'url2', 'placeholder' =>'Ruta del artículo', 'readonly')) }}
    <div class="checkbox">
      <label>
        <input type="checkbox" id="casilla3" value="1" onclick="desactivar()" checked="checked"> Colocar ruta manualmente 
      </label>
    </div>
    {{ Form::label('content', 'Content:') }} 
    {{ Form::textarea('content', null, array('class' => 'form-control', 'id' => 'edit')) }}
    <script>
        $(function() {
            $('#edit').editable({inlineMode: false})
        });
    </script>
    {{ Form::label('file', 'File:') }} 
    {{ Form::file('file') }}
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
        <input type="radio" name="comentario" id="optionsRadios1" value="no" checked>
        No
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="comentario" id="optionsRadios2" value="si">
        Si
      </label>
    </div>
    <br>
    @if($action == 'Crear')      
      {{ Form::button($action.' artículo', array('type' => 'submit', 'class' => 'btn btn-success')) }}
    @else
      {{ Form::button($action.' artículo', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
    @endif
   
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($post, array('route' => array('post.destroy', $post->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar artículo', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop