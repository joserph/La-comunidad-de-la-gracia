@extends('master.layout4')
@section ('title') Iniciar sesión | Iglesia La Comunidad de la Gracia @stop
@section('content')
@include ('admin/errors', array('errors' => $errors))
<form action="{{ URL::route('account-sign-in-post') }} " method="post" class="form-signin" role="form">
	<div class="col-md-6 col-md-offset-3">
		<legend><h3 class="form-signin-heading">Iniciar sesión</h3></legend>
		
		{{ Form::label('email', 'Email:') }} 
		<div class="input-group">
		    <div class="input-group-addon">@</div>
			<input type="email" class="form-control" placeholder="Tu email" autofocus name="email" {{ (Input::old('email')) ? 'value="' . e(Input::old('email')) . '"' : '' }} >
		</div>
		{{ Form::label('password', 'Password:') }}
		<div class="input-group">
		    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div> 
		{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Tu contraseña'))}}
		</div>
		<div class="checkbox">
			<label for="remember">
				<input type="checkbox" name="remember" id="remember"> Recuérdame 
			</label>
		</div>
		<button class="btn btn-info btn-block" type="submit">Iniciar sesión</button>
		{{ Form::token() }}
	</div>
</form>
@stop