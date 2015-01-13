@extends('master.layout4')
@section ('title') Regístrate | Iglesia La Comunidad de la Gracia @stop
@section('content')
@include ('admin/errors', array('errors' => $errors))
<form action="{{ URL::route('account-create-post') }} " method="post" class="form-signin">
	<div class="col-md-6 col-md-offset-3">
		<legend><h3 class="form-signin-heading">Regístrate</h3></legend>
		
		{{ Form::label('email', 'Email:') }}
		<div class="input-group">
		    <div class="input-group-addon">@</div> 
			<input type="email" class="form-control" placeholder="Tu email" autofocus name="email" {{ (Input::old('email')) ? 'value="' . e(Input::old('email')) . '"' : '' }} >
		</div>	
		{{ Form::label('username', 'Usuario:') }}
		<div class="input-group">
		    <div class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></div>  
			<input type="text" class="form-control" placeholder="Nombre de usuario" name="username" { (Input::old('username')) ? 'value="' . e(Input::old('username')) . '"' : '' }} >	
		</div>
		{{ Form::label('password', 'Password:') }}
		<div class="input-group">
		    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>  
			<input type="password" name="password" class="form-control" placeholder="Contraseña">
		</div>	
		{{ Form::label('password_again', 'Repetir password:') }} 
		<div class="input-group">
		    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div> 
			<input type="password" name="password_again" class="form-control" placeholder="Repetir contraseña">
		</div>
		{{ Form::label('Captcha', 'Captcha:') }} <br> 
		{{ Form::image(Captcha::img(), 'Captcha image') }}
		<div class="input-group">
		    <div class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></div>  
			{{ Form::text('captcha', null, array('class' => 'form-control', 'placeholder' => 'Ingresa captcha')) }}
		</div>
		<br>
		<button class="btn btn-success btn-block" type="submit">Crear cuenta</button>	
		{{ Form::token() }}
	</div>
</form>
@stop