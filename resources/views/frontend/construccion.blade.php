<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nezco</title>
<link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
	<style type="text/css" media="screen">

		html, body{

			height: 100%;
			min-height: 100%


		}

		body{
			background-image: url('{{ asset('images/construccion.svg') }}');
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center center;
			overflow: hidden;
			text-align: center;
			font-family: 'Archivo Black', sans-serif;
		}

		img{
			width: 90%;
			padding-top: 5%;
		}
		.img{
			position: relative;
			margin-left: auto;
			margin-right: auto;
			width: 30%;
			background-color: rgba(255,255,255,.9);
			border-radius: 10px;
			margin-top: 4em;

		}
		h1{
			padding-top: 10%;
			padding-bottom: 10%;
		}


	</style>
</head>
<body>
	
	<div class="img">
		<img src="{{ asset('images/LogoNezco.svg') }}" alt="">
		<h1>Sitio en Construcción</h1>
	</div>
	
	
</body>
</html>