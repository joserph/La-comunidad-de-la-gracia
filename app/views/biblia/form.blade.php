@extends('master.layout1')

<?php
    if ($biblia->exists):
        $form_data = array('route' => array('biblia.update', $biblia->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'biblia.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;
?>
@section ('title') {{ $action }} versículo | La Comunidad de la Gracia @stop
@section('content')

<script>
  $(document).ready(function(){
    
    $("#versiculo").blur(function(){
      libro = $('#libro').val();
      capitulo = $('#capitulo').val();
      versiculo = $('#versiculo').val();
      puntos = ":";
      espacio = " ";
      
     $('#texto').val(libro+espacio+capitulo+puntos+versiculo);
    });
  });
</script>
	{{ Form::model($biblia, $form_data, array('role' => 'form')) }}
  <legend><h3 class="form-signin-heading">{{ $action }} Versículo</h3></legend>
  <ul class="breadcrumb">
      <li><a href="{{ URL::route('home') }}">Inicio</a></li>
      <li><a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a></li>
      <li><a href="{{ route('biblia.index') }}">Lista de Versículo</a></li>
      <li class="active">{{ $action }} Versículo</li>
  </ul>
  @include ('admin/errors', array('errors' => $errors))

    @if($action == "Crear")
      <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
      <input type="hidden" name="update_user" value="{{ Auth::user()->id }}">
    @else
      <input type="hidden" name="update_user" value="{{ Auth::user()->id }}">
    @endif
    
    {{ Form::label('libro', 'Libro:') }} 
    {{ Form::select('libro', array(
      '' => 'Select',
      'Génesis' => 'Génesis',
      'Exodo' => 'Exodo',
      'Levítico' => 'Levítico',
      'Números' => 'Número',
      'Deuteronomio'=> 'Deuteronomio',
      'Josué' => 'Josué',
      'Jueces' => 'Jueces',
      'Rut' => 'Rut',
      '1 Samuel' => '1 Samuel',
      '2 Samuel' => '2 Samuel', 
      '1 Reyes' => '1 Reyes',
      '2 Reyes' => '2 Reyes', 
      '1 Crónicas' => '1 Crónicas',
      '2 Crónicas' => '2 Crónicas', 
      'Esdras' => 'Esdras', 
      'Nehemías' => 'Nehemías',
      'Ester' => 'Ester', 
      'Job' => 'Job', 
      'Salmos' => 'Salmos',
      'Proverbios' => 'Proverbios',
      'Eclesiastés' => 'Eclesiastés',
      'Cantares' => 'Cantares', 
      'Isaías' => 'Isaías',
      'Jeremías' => 'Jeremías', 
      'Lamentaciones' => 'Lamentaciones', 
      'Ezequiel' => 'Ezequiel', 
      'Daniel' => 'Daniel', 
      'Oseas' => 'Oseas', 
      'Joel' => 'Joel', 
      'Amos' => 'Amos', 
      'Abdías' => 'Abdías', 
      'Jonás' => 'Jonás',
      'Miqueas' => 'Miqueas',
      'Nahúm' => 'Nahúm', 
      'Habacuc' => 'Habacuc', 
      'Sofonías' => 'Sofonías', 
      'Hageo' => 'Hageo', 
      'Zacarías' => 'Zacarías',
      'Malaquías' => 'Malaquías',
      'Mateo' => 'Mateo',
      'Marcos' => 'Marcos',
      'Lucas' => 'Lucas', 
      'Juan' => 'Juan', 
      'Hechos' => 'Hechos',
      'Romanos' => 'Romanos', 
      '1 Corintios' => '1 Corintios',
      '2 Corintios' => '2 Corintios',
      'Gálatas' => 'Gálatas',
      'Efesios' => 'Efesios', 
      'Filipenses' => 'Filipenses',
      'Colosenses' => 'Colosenses',
      '1 Tesalonicenses' => '1 Tesalonicenses',
      '2 Tesalonicenses' => '2 Tesalonicenses', 
      '1 Timoteo' => '1 Timoteo',
      '2 Timoteo' => '2 Timoteo', 
      'Tito' => 'Tito',
      'Filemón' => 'Filemón',
      'Hebreos' => 'Hebreos',
      'Santiago' => 'Santiago',
      '1 Pedro' => '1 Pedro',
      '2 Pedro' => '2 Pedro', 
      '1 Juan' => '1 Juan',
      '2 Juan' => '2 Juan',
      '3 Juan' => '3 Juan', 
      'Judas' => 'Judas',
      'Apocalipsis' => 'Apocalipsis' 
      ), null, ['class' => 'form-control', 'autofocus', 'id' => 'libro']) 
    }} 
    {{ Form::label('capitulo', 'Capítulo:') }} 
    {{ Form::text('capitulo', null, array('class' => 'form-control', 'placeholder' => 'Número del capitulo', 'id' => 'capitulo')) }} 
    {{ Form::label('versiculo', 'Versículo:') }} 
    {{ Form::text('versiculo', null, array('class' => 'form-control', 'placeholder' => 'Número del versículo', 'id' => 'versiculo')) }} 
    <input type="hidden" name="texto" value="" id="texto"> 
    {{ Form::label('content', 'Contenido:') }} 
    {{ Form::textarea('content', null, array('class' => 'form-control')) }} 
    <br>
    @if($action == 'Crear')
      {{ Form::button($action.' versículo', array('type' => 'submit', 'class' => 'btn btn-success')) }}
    @else
      {{ Form::button($action.' versículo', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
    @endif
   
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($biblia, array('route' => array('biblia.destroy', $biblia->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar versículo', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop