@extends('master.layout4')
@section ('title') Recuperar contraseña | Iglesia La Comunidad de la Gracia @stop
@section('content')
@include ('admin/errors', array('errors' => $errors))
	<form action=" {{ URL::route('account-forgot-password-post') }} " method="post" class="form-signin">
		<div class="col-md-6 col-md-offset-3">
			<legend><h3 class="form-signin-heading">Recuperar contraseña</h3></legend>
			
			{{ Form::label('email', 'Email:') }}
			<div class="input-group">
		    	<div class="input-group-addon">@</div> 
				<input type="email" class="form-control" placeholder="Tu email" autofocus name="email" {{ (Input::old('email')) ? 'value="' . e(Input::old('email')) . '"' : '' }} >
			</div>
			<br>
			<button class="btn btn-warning btn-block" type="submit">Recuperar</button>	
			{{ Form::token() }}	
		</div>
	</form>
@stop