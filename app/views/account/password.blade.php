@extends('master.layout4')
@section ('title') Cambiar contraseña | Iglesia La Comunidad de la Gracia @stop
@section('content')
	
<form action="{{ URL::route('account-change-password-post') }} " method="post">
	<div class="col-md-6 col-md-offset-3">
		<legend><h3 class="form-signin-heading">Cambiar contraseña</h3></legend>
		@include ('admin/errors', array('errors' => $errors))
		{{ Form::label('old_password', 'Password actual:') }}
		<input type="password" name="old_password" class="form-control" placeholder="Contraseña actual">
		{{ Form::label('new_password', 'Password nuevo:') }}
		<input type="password" name="password" class="form-control" placeholder="Nueva contraseña">
		{{ Form::label('new_password_again', 'Repetir Password nuevo:') }}
		<input type="password" name="password_again" class="form-control" placeholder="Repetir conteseña">	
		<br>
		<button class="btn btn-warning btn-block" type="submit">Cambiar contraseña</button>
		{{ Form::token() }}	
	</div>
</form>

@stop