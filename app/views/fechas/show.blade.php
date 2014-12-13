@extends ('master.layout')
@section ('title') {{ $fechas->fecha }} | Iglesia La Comunidad de la Gracia @stop
@section ('content')

   	@if($fechas->tipo == "año")
   	<legend><h1><span class="text-capitalize">{{ $fechas->fecha }}</span></h1></legend>
   	@else
   	<legend><h1>Predicas <span class="text-lowercase">{{ $fechas->fecha }}</span></h1></legend>
   	@endif
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li class="active">{{ $fechas->fecha }}</li>
    </ul>
    @if((Auth::check() && (Auth::user()->id_rol == 0)) || (Auth::check() && (Auth::user()->id_rol == 1)))
    	<blockquote>
		<dl class="dl-horizontal">
		  <dt>Fecha:</dt>
		  <dd>{{ $fechas->fecha }}.</dd>
		  <dt>URL:</dt>
		  <dd>{{ $fechas->url }}.</dd>
		  <dt>Tipo:</dt>
		  <dd>{{ $fechas->tipo }}.</dd>
		</dl>
		<small><strong>Creado el 
			<cite title="Source Title">
				{{ date("d/m/Y H:i:s a", strtotime($fechas->created_at)) }}
			</cite>
			 por 
			<cite>
				@foreach($users as $user)
		            @if($user->id == $fechas->id_user)
		                {{ $user->username }}.
		            @endif
		        @endforeach
			</cite>
		</strong></small>
		<small><strong>Ultima actualización el 
			<cite title="Source Title">
				{{ date("d/m/Y H:i:s a", strtotime($fechas->updated_at)) }}
			</cite>
			 por 
			<cite>
				@foreach($users as $user)
		            @if($user->id == $fechas->update_user)
		                {{ $user->username }}.
		            @endif
		        @endforeach
			</cite>
		</strong></small>
		</blockquote>
    @endif

	@if($fechas->tipo == "año")
	    @foreach($predicas as $predica)
	    	@if($predica->anio == $fechas->id)
	    	<div class="col-md-4">
    			<div class="panel panel-primary cuadro">	
					<div class="panel-body">
						<div class="list-group">							
					        <!--///////////////**************//////////////////////-->
				            <div class="">
				              	<h4 class="text-center">{{ $predica->title }}</h4>
				              	@foreach($predicadores as $predicador)
               						@if($predicador->id == $predica->predicador)
							            <p class="text-center text-muted text-uppercase autorpre3">~{{ $predicador->nombre }}~</p>			            
						                <p class="text-center"><em> - {{ date("d/m/Y", strtotime($predica->fecha)) }} -</em></p> 
					                    <div class="text-center">
					                      	<a href="{{ URL::route('predicas-show', $predica->url) }}" class="btn btn-info text-center">
					                      	<span class="glyphicon glyphicon-headphones"></span> 
					                      	Escuchar Audio</a>
					                    </div>
			                    	@endif
            					@endforeach				                
				            </div> 
				        </div>						
					</div>
				</div>
			</div>
	    	@endif 
	    @endforeach
	@elseif($fechas->tipo == "mes")
		@foreach($predicas as $predica)
	    	@if($predica->mes == $fechas->id)
				<div class="col-md-4">
    			<div class="panel panel-primary cuadro">	
					<div class="panel-body">
						<div class="list-group">							
					        <!--///////////////**************//////////////////////-->
				            <div class="">
				              	<h4 class="text-center">{{ $predica->title }}</h4>
				              	@foreach($predicadores as $predicador)
               						@if($predicador->id == $predica->predicador)
							            <p class="text-center text-muted text-uppercase autorpre3">~{{ $predicador->nombre }}~</p>			            
						                <p class="text-center"><em> - {{ date("d/m/Y", strtotime($predica->fecha)) }} -</em></p> 
					                    <div class="text-center">
					                      	<a href="{{ URL::route('predicas-show', $predica->url) }}" class="btn btn-info text-center">
					                      	<span class="glyphicon glyphicon-headphones"></span> 
					                      	Escuchar Audio</a>
					                    </div>
			                    	@endif
            					@endforeach				                
				            </div> 
				        </div>						
					</div>
				</div>
			</div>
	    	@endif 
	    @endforeach
	@endif
  	<br>
@stop