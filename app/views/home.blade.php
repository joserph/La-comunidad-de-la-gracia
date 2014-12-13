@extends('master.layout')

@section('carrusel')
<!--Carrusel-->
<div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
  <!-- Indicators -->
    <ol class="carousel-indicators">
    <?php $cont = -1;?>
    @foreach ($sliders as $slider)
        <li data-target="#carousel-example-generic" data-slide-to="{{ $cont += 1 }}" class="{{ $slider->tipo }}"></li>
    @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
    @foreach ($sliders as $slider)
    <div class="item {{ $slider->tipo }}">
        @foreach($archivos as $archivo)
            @if($slider->f_ruta == $archivo)
                <img src="{{ $archivo }}" class="img-responsive" alt="Cdlgracia_{{ $slider->f_nombre }}">
            @endif
        @endforeach
        <div class="carousel-caption">
            <div>
                <p>
                    <a class="btn btn-info" href="{{ $slider->ruta }}">Leer mas</a>
                </p>
            </div>
        </div>
    </div>
    @endforeach
    </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
<!-- Fin Carrusel-->

<!-- Versículo Diario-->
<?php 
	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
?> 

@foreach($cronjobs as $cronjob)
	@if($cronjob->dia == $dias[date("w")])
		@foreach($biblia as $verso)
      @if($verso->id == $cronjob->id_tarea)
      <div class="well">
        <p><em>{{ $verso->content }}</em></p>
        <p>
          <strong>
            <small>{{ $verso->libro }} {{ $verso->capitulo }}:{{ $verso->versiculo }}</small>
          </strong>
        </p>
      </div>                         
      @endif
    @endforeach 
	@endif
@endforeach	
<!-- Fin Versículo Diario-->
@stop

@section('content')

<h3><span class="label label-info hidden-xs">Página {{ $predicas->getCurrentPage() }} de {{ $predicas->getLastPage() }}</span></h3>
<script type="text/javascript">
//<![CDATA[
  (function() {
    var shr = document.createElement('script');
    shr.setAttribute('data-cfasync', 'false');
    shr.src = '//dsms0mj1bbhn4.cloudfront.net/assets/pub/shareaholic.js';
    shr.type = 'text/javascript'; shr.async = 'true';
    shr.onload = shr.onreadystatechange = function() {
      var rs = this.readyState;
      if (rs && rs != 'complete' && rs != 'loaded') return;
      var site_id = 'f6fe8870b5cd965492c5db93efebb08a';
      try { Shareaholic.init(site_id); } catch (e) {}
    };
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(shr, s);
  })();
//]]>
</script>

<!-- Contenido principal-->

@foreach ($predicas as $predica)
@if($predica->estatus == 'publicado')
<div class="panel panel-primary">
  
  <div class="panel-heading">
      <h1 class="panel-title text-uppercase">
        <a href="{{ URL::route('predicas-show', $predica->url) }}">{{ $predica->title }}.</a>
      </h1>
  </div>
  
  <div class="panel-body">
    <div class="list-group">
      <div class="list-group-item">
        <span class="glyphicon glyphicon-calendar"></span> Publicado por
        @foreach($users as $user)
          @if($user->id == $predica->id_user)
            {{ $user->username }},
          @endif
        @endforeach   
          el {{ date("d/m/Y", strtotime($predica->created_at)) }}.
        <span class="badge">
          <span class="glyphicon glyphicon-comment"> </span> 
            {{ $comentario = DB::table('comentarios')->where('id_articulo', '=', $predica->id)->count() }}
        </span>
      </div>
      </div>
    <div class="media">
        @foreach($archivos as $archivo)
            @if(($predica->f_ruta == $archivo))             
                <a class="pull-left" href="{{ URL::route('predicas-show', $predica->url) }}">
                    <img src="{{ $archivo }}" class="img-responsive img-rounded" width="160" height="90" alt="{{ $predica->url }}">
                </a>
            @endif
        @endforeach
       
        @if($predica->tipo == 'post')
          <p class="text-justify">{{ substr($predica->content, 0, 250) }}...</p>
        @else
          <div class="contentpre1">
          <div class="imagen1 hidden-xs">
          <?php
            $alt = DB::table('predicadores')->where('id', '=', $predica->predicador)->first();
          ?>
            <img class="img-responsive imagen1" src="assets/img/{{ $predica->predicador }}.png" alt="{{ $alt->nombre }}">
          </div>
            <!--///////////////**************//////////////////////-->
            <div class="infopre1 hidden-xs">
              <h2 class="text-center titulopre2">{{ $predica->title }}</h2>
            @foreach($predicadores as $predicador)
                @if($predicador->id == $predica->predicador)
                    <p class="autorpre2 text-center text-muted text-uppercase">~{{ $predicador->nombre }}~</p>
                    <p class="text-center"><em> - {{ date("d/m/Y", strtotime($predica->fecha)) }} -</em></p> 
                    <div class="text-center">
                      <a href="{{ URL::route('predicas-show', $predica->url) }}" class="btn btn-info hidden-xs text-center">
                      <span class="glyphicon glyphicon-headphones"></span> 
                      Escuchar Audio</a>
                    </div>
                @endif
            @endforeach
            </div> 
            <!--///////////////*******Phones (<768px)*******//////////////////////-->
            <div class="visible-xs">
              <p class="titulopre text-center">{{ $predica->title }}</p>
              @foreach($predicadores as $predicador)
                  @if($predicador->id == $predica->predicador)
                      <p class="text-center text-muted text-uppercase">~{{ $predicador->nombre }}~</p>
                      <p class="text-center"><em> - {{ date("d/m/Y", strtotime($predica->fecha)) }} -</em></p> 
                      <div class="text-center">
                        <a href="{{ URL::route('predicas-show', $predica->url) }}" class="btn btn-info hidden-xs text-center">
                        <span class="glyphicon glyphicon-headphones"></span> 
                        Escuchar Audio</a>
                      </div>
                  @endif
              @endforeach
            </div>
          </div>     
          <p>
            <a href="{{ URL::route('predicas-show', $predica->url) }}" class="btn btn-info visible-xs">
              <span class="glyphicon glyphicon-headphones"></span> 
                Escuchar Audio</a></a>
          </p>
         @endif
         @if($predica->tipo == 'post')
          <p>
            <a href="{{ URL::route('predicas-show', $predica->url) }}" class="btn btn-info">Leer más</a>
          </p>
        @endif
      <div class='shareaholic-canvas hidden-xs' data-app='share_buttons' data-app-id='7802505'></div>

    </div>
  </div>
</div>
@endif
@endforeach

@foreach ($predicas as $predica)
@if(isset($_GET['buscar']))
<div class="panel panel-primary">
  
  <div class="panel-heading">
      <h1 class="panel-title text-uppercase">
        <a href="{{ URL::route('predicas-show', $predica->url) }}">{{ $predica->title }}.</a>
      </h1>
  </div>
  
  <div class="panel-body">
    <div class="list-group">
      <div class="list-group-item">
        <span class="glyphicon glyphicon-calendar"></span> Publicado por
        @foreach($users as $user)
          @if($user->id == $predica->id_user)
            {{ $user->username }},
          @endif
        @endforeach   
          el {{ date("d/m/Y", strtotime($predica->created_at)) }}.
        <span class="badge">
          <span class="glyphicon glyphicon-comment"> </span> 
            {{ $comentario = DB::table('comentarios')->where('id_articulo', '=', $predica->id)->count() }}
        </span>
      </div>
      </div>
    <div class="media">
        @foreach($archivos as $archivo)
            @if(($predica->f_ruta == $archivo))             
                <a class="pull-left" href="{{ URL::route('predicas-show', $predica->url) }}">
                    <img src="{{ $archivo }}" class="img-responsive img-rounded" width="160" height="90" alt="{{ $predica->url }}">
                </a>
            @endif
        @endforeach
       
        @if($predica->tipo == 'post')
          <p class="text-justify">{{ substr($predica->content, 0, 250) }}...</p>
        @else
          <div class="contentpre1">
          <div class="imagen1 hidden-xs">
          <?php
            $alt = DB::table('predicadores')->where('id', '=', $predica->predicador)->first();
          ?>
            <img class="img-responsive imagen1" src="assets/img/{{ $predica->predicador }}.png" alt="{{ $alt->nombre }}">
          </div>
            <!--///////////////**************//////////////////////-->
            <div class="infopre1 hidden-xs">
              <h2 class="text-center titulopre2">{{ $predica->title }}</h2>
            @foreach($predicadores as $predicador)
                @if($predicador->id == $predica->predicador)
                    <p class="autorpre2 text-center text-muted text-uppercase">~{{ $predicador->nombre }}~</p>
                    <p class="text-center"><em> - {{ date("d/m/Y", strtotime($predica->fecha)) }} -</em></p> 
                    <div class="text-center">
                      <a href="{{ URL::route('predicas-show', $predica->url) }}" class="btn btn-info hidden-xs text-center">
                      <span class="glyphicon glyphicon-headphones"></span> 
                      Escuchar Audio</a>
                    </div>
                @endif
            @endforeach
            </div> 
            <!--///////////////*******Phones (<768px)*******//////////////////////-->
            <div class="visible-xs">
              <p class="titulopre text-center">{{ $predica->title }}</p>
              @foreach($predicadores as $predicador)
                  @if($predicador->id == $predica->predicador)
                      <p class="text-center text-muted text-uppercase">~{{ $predicador->nombre }}~</p>
                      <p class="text-center"><em> - {{ date("d/m/Y", strtotime($predica->fecha)) }} -</em></p> 
                      <div class="text-center">
                        <a href="{{ URL::route('predicas-show', $predica->url) }}" class="btn btn-info hidden-xs text-center">
                        <span class="glyphicon glyphicon-headphones"></span> 
                        Escuchar Audio</a>
                      </div>
                  @endif
              @endforeach
            </div>
          </div>     
          <p>
            <a href="{{ URL::route('predicas-show', $predica->url) }}" class="btn btn-info visible-xs">
              <span class="glyphicon glyphicon-headphones"></span> 
                Escuchar Audio</a></a>
          </p>
         @endif
         @if($predica->tipo == 'post')
          <p>
            <a href="{{ URL::route('predicas-show', $predica->url) }}" class="btn btn-info">Leer más</a>
          </p>
        @endif
      <div class='shareaholic-canvas hidden-xs' data-app='share_buttons' data-app-id='7802505'></div>

    </div>
  </div>
</div>
@endif
@endforeach
{{ $predicas->appends(array('buscar' => Input::get('buscar')))->links() }}
<!-- Fin Contenido principal-->
@stop
@section('aside')
{{ Form::open(array('url' => '/', 'method' => 'GET', 'role' => 'form', 'class' => 'form-horizontal')) }}
  <div class="input-group hidden-xs">
    {{ Form::text('buscar', null, array('class' => 'form-control', 'placeholder' => 'Buscar')) }}
    <span class="input-group-btn">
      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button> 
  </span>
</div>
{{ Form::close() }}
<br>
@stop
@section('aside1')
<div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">Petición de Oración</h3>
            </div>
            <div class="panel-body">
              @include('oracion.form')
            </div>
          </div>
<!-- Fin Aside-->
@stop