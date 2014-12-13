@extends('master.layout2')

@section('content')
<legend><h1 class="form-signin-heading">Galeria</h1></legend>
<ul class="breadcrumb">
    <li><a href="{{ URL::route('home') }}">Inicio</a></li>
    <li class="active">Galeria</li>
</ul>
@if((Auth::check()) && (Auth::user()->id_rol == 0))
	<form action="{{ URL::route('create-dir') }} " method="post" class="form-signin">
		<input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
		{{ Form::label('dir', 'Directorio:') }}
		{{ Form::text('dir', null, array('class' => 'form-control', 'required')) }} <br>
		{{ Form::button('Crear directorio', array('type' => 'submit', 'class' => 'btn btn-success btn-sm')) }}
	</form>
	<hr>
@endif
@foreach($dir as $dire)
<div class="">
<?php $cont = 0;?>
	@foreach($photos as $photo)
  		@if($dire->id == $photo->estado)
  			@if($cont == 0)
  			<?php $cont += 1;?>
			<div class="panel panel-info">
  				<div class="panel-heading">
			    	<h3 class="panel-title">
			    	<span class="glyphicon glyphicon-picture"></span> {{ $dire->nombre }}
			    	</h3>		
  				</div>

	  			<div class="panel-body">
	  			@foreach($photos as $photo)
	  				@if($dire->id == $photo->estado)
	  					<div class="col-xs-6 col-sm-3">	
							<a href="{{ $photo->name }}" title="{{ $photo->nombre }}" class="fancybox" rel="group{{ $photo->estado }}">
								<img src="{{ $photo->name }}" alt="" width="320" height="320" class="img-responsive img-thumbnail">
							</a>
							@if((Auth::check()) && (Auth::user()->id_rol == 0))
								<a href="{{ URL::route('delete-photo', array($photo->id)) }}" >
									<button type="button" class="btn btn-danger btn-sm btn-lg btn-block" data-toggle="tooltip" data-placement="top" title="Borrar">
										<span class="glyphicon glyphicon-trash"></span>
									</button>
								</a>
							@endif
						</div>				
	  				@endif
	  			@endforeach
	  			</div>
			</div>
			@endif
		@endif
	@endforeach
</div>
@endforeach

<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<!-- Add fancyBox -->
<link rel="stylesheet" href="assets/source/jquery.fancybox.css" type="text/css" media="screen" />
<script type="text/javascript" src="assets/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>
@stop