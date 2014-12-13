@extends ('master.layout')
@section ('title') Predicas de {{ $predicadores->nombre }} | Iglesia La Comunidad de la Gracia @stop
@section ('content')

	<legend><h1>Predicas de {{ $predicadores->nombre }}</h1></legend>
    <ul class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li class="active">{{ $predicadores->nombre }}</li>
    </ul>
    @if((Auth::check() && (Auth::user()->id_rol == 0)) || (Auth::check() && (Auth::user()->id_rol == 1)))
    	<blockquote>
		<dl class="dl-horizontal">
		  <dt>Nombre:</dt>
		  <dd>{{ $predicadores->nombre }}.</dd>
		  <dt>URL:</dt>
		  <dd>{{ $predicadores->url }}.</dd>
		</dl>
		<small><strong>Creado el 
			<cite title="Source Title">
				{{ date("d/m/Y H:i:s a", strtotime($predicadores->created_at)) }}
			</cite>
			 por 
			<cite>
				@foreach($users as $user)
		            @if($user->id == $predicadores->id_user)
		                {{ $user->username }}.
		            @endif
		        @endforeach
			</cite>
		</strong></small>
		<small><strong>Ultima actualización el 
			<cite title="Source Title">
				{{ date("d/m/Y H:i:s a", strtotime($predicadores->updated_at)) }}
			</cite>
			 por 
			<cite>
				@foreach($users as $user)
		            @if($user->id == $predicadores->update_user)
		                {{ $user->username }}.
		            @endif
		        @endforeach
			</cite>
		</strong></small>
		</blockquote>
    @endif

    @foreach($predicas as $predica)
    	@if($predica->predicador == $predicadores->id)
				<div class="col-md-4">
    			<div class="panel panel-primary cuadro">	
					<div class="panel-body">
						<div class="list-group">							
					        <!--///////////////**************//////////////////////-->
				            <div class="">
				              	<h4 class="text-center">{{ $predica->title }}</h4>               						
					            <p class="text-center text-muted text-uppercase autorpre3">~{{ $predicadores->nombre }}~</p>		            
				                <p class="text-center"><em> - {{ date("d/m/Y", strtotime($predica->fecha)) }} -</em></p> 
			                    <div class="text-center">
			                      	<a href="{{ URL::route('predicas-show', $predica->url) }}" class="btn btn-info text-center">
			                      	<span class="glyphicon glyphicon-headphones"></span> 
			                      	Escuchar Audio</a>
			                    </div>			                    				                
				            </div> 
				        </div>						
					</div>
				</div>
			</div>
    	@endif 
    @endforeach
  	<br>
@stop