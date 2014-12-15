@extends ('master.layout')
@section ('title') {{ $predica->title }} | Iglesia La Comunidad de la Gracia @stop
@section ('content')
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

    @if($predica->tipo == 'post')
        <legend><h1>{{ $predica->title }}</h1></legend>
    @endif
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li class="active">{{ $predica->title }}</li>
    </ul>
    @if((Auth::check() && (Auth::user()->id_rol == 0)) || (Auth::check() && (Auth::user()->id_rol == 1)))
        @if($predica->tipo != 'post')
    		<p><a href="{{ route('predicas.edit', $predica->id) }}" class="btn btn-warning btn-sm">Editar</a></p>
    	@else
    		<p><a href="{{ route('post.edit', $predica->id) }}" class="btn btn-warning btn-sm">Editar</a></p>
    	@endif
    @endif
    
    <div class="panel panel-default">
        <div class="panel-heading">
             <span class="glyphicon glyphicon-calendar"></span> Publicado por
            @foreach($users as $user)
                @if($user->id == $predica->id_user)
                    {{ $user->username }},
                @endif
            @endforeach   
            el {{ date("d/m/Y", strtotime($predica->created_at)) }}.
        </div>
        <div class="panel-body">
        @foreach($archivos as $archivo)
            @if(($predica->f_ruta == $archivo) && ($predica->title != 'Video'))
                <p class="text-center">
                    <img src="{{ $archivo }}" class="img-thumbnail" width="500" alt="{{ $predica->f_name }}">
                </p>
            @endif
        @endforeach

        @if($predica->tipo == "predica")
            <h2 class="text-center">{{ $predica->title }}</h2>
            @foreach($predicadores as $predicador)
                @if($predicador->id == $predica->predicador)
                    <p class="autorpre text-center text-muted text-uppercase">~{{ $predicador->nombre }}~</p>
                    <p class="text-center"><em> - {{ date("d/m/Y", strtotime($predica->fecha)) }} -</em></p> 
                @endif
            @endforeach
        @endif

        <p>{{ $predica->content }}</p>
        <p>{{ $predica->audio }}</p>
        @if($predica->tipo == "predica")
            <p>
                <b>Fecha:</b> 
                @foreach($fechas as $fecha)
                    @if($fecha->id == $predica->anio)
                        <a href="{{ URL::route('fechas-show', $fecha->url) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-tag"></span> {{ $fecha->fecha }}</a>
                    @endif
                @endforeach
                @foreach($fechas as $fecha)
                    @if($fecha->id == $predica->mes)
                        <a href="{{ URL::route('fechas-show', $fecha->url) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-tag"></span> {{ $fecha->fecha }}</a>
                    @endif
                @endforeach
            </p>
            <p>
                <b>Predicador:</b> 
                @foreach($predicadores as $predicador)
                    @if($predicador->id == $predica->predicador)
                        <a href="{{ URL::route('predicadores-show', $predicador->url) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-tag"></span> {{ $predicador->nombre }}</a> 
                    @endif
                @endforeach
            </p>
        @endif
        @include('estrella.home')
        <div class='shareaholic-canvas' data-app='share_buttons' data-app-id='7802505'></div>
    </div>
</div>
@if($predica->comentario == 'si')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="badge">
              {{ $comentario = DB::table('comentarios')->where('id_articulo', '=', $predica->id)->count() }}
            </span> Comentarios
        </h3>
    </div>
    
    <div class="panel-body">
        @include('comentarios.form')
    </div>

</div>
@endif
<br>
@stop
