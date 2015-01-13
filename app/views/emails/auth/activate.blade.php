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
	<h2 style="text-align: center; font-family: Helvetica;">Activar cuenta</h2>
	<p>Hola {{ $username }}, Dios te bendiga.</p>

	<p>Para activar su cuenta por favor haga clic en el siguiente enlace:</p>
	<div style="background-color: #162840; padding: 20px; max-width: 400px; height: 100%; margin: 0 auto;">
		<p style="color: #fff; text-align: justify; width: 100%;">{{ $link }}</p>
	</div>	
	<p>Gracias por registrarte.</p>
	--- <br>
	<p>Este mail se envio desde {{ $home }}</p> 
	---
</body>
</html>
