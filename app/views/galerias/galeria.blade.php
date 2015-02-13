@extends('master.layout1')

@section('content')


	<h3>Suba imagen</h3>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Dropzone File Upload</h3>
			</div>

			{{ Form::open(array(
				'url' => 'upload',
				'file' => true,
				'class' => 'dropzone',
				'id' => 'my-dropzone',
				'method' => 'post',
				))
			}}
			
			{{ Form::close() }}
		</div>
		<a href="{{ URL::route('galeria') }}" class="btn btn-info">Ver Galeria</a>
	</div>
@stop