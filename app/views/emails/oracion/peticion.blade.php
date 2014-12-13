<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body style="background: #b6dbec; margin: 0px; padding: 0px; font-family: Verdana, Helvetica; color: #162840;">
	<div style="text-align: center;">
		<img src="{{ $message->embed('assets/img/header01.png') }}" alt="h" style="width: 100%;">
	</div>
	<h2 style="text-align: center; font-family: Helvetica;">Petición de Oración</h2>
	<p>Hola Lider de Oración Dios te Bendiga,</p>

	<p>El presente es para informarte que el(la) señor(a) {{ $nombre }} tiene la siguiente petición de oración.</p>
	<div style="background-color: #162840; padding: 20px; max-width: 400px; height: 100%; margin: 0 auto;">
		<p style="color: #fff; text-align: justify; width: 100%;"><em>"{{ $peticion }}"</em></p>
	</div>	

	--- <br>
	<p>Este mail se envio desde {{ $link }}</p> 
	---
</body>
</html>
