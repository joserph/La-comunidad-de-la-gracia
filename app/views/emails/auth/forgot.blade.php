<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body style="background: #b6dbec; margin: 0px; padding: 0px; font-family: Verdana, Helvetica; color: #162840;">
	<div style="text-align: center;">
		<img src="{{ $message->embed('assets/img/header01.png') }}" alt="h" style="width: 100%;">
		<img src="{{ $message->embed('assets/img/titulo.png') }}" alt="t" style="width: 50%;">
	</div>
	<h2 style="text-align: center; font-family: Helvetica;">Recuperar contraseña</h2>
	<p>Hola {{ $username }}, Dios te bendiga.</p>

	<p>Parece que ha solicitado una nueva contraseña. Usted tendrá que utilizar el siguiente enlace para activarlo. Si usted no solicitó una nueva contraseña, por favor, ignora este mensaje.</p>
	<div style="background-color: #162840; padding: 20px; max-width: 400px; height: 100%; margin: 0 auto;">
		<p style="color: #fff; text-align: justify; width: 100%;">Nueva contraseña: {{ $password }}</p>
	</div>
	<p>Entrar en el siguiente enlace: {{ $link }}</p>	
	--- <br>
	<p>Este mail se envio desde {{ $home }}</p> 
	---
</body>
</html>
