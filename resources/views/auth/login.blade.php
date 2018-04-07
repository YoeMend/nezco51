<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Main CSS-->
<link rel="stylesheet"  type="text/css" href="http://nezco.com.ve/public/css/main.css" type="text/css">	<!-- Font-icon css-->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Login - Nezco SAC</title>
</head>
<body>
	<section class="material-half-bg">
		<div class="cover"></div>
	</section>
	<section class="login-content">
		<div class="text-center">
			
			<img src="http://nezco.com.ve/public/img/LogoNezco.svg" width="25%">
			<h3 class="py-4">Sistema de Administración de Contenido</h3>
			
		</div>
		<div class="login-box">
			<form class="login-form" method="POST" action="{{ route('login') }}">
				{{ csrf_field() }}
				<div class="form-group" {{ $errors->has('email') ? ' has-error' : '' }}>
					<label class="control-label">Usuario(E-mail)</label>
					<input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="E-mail">
					@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group" {{ $errors->has('password') ? ' has-error' : '' }}>
					<label class="control-label">Contraseña</label>
					<input class="form-control" name="password" id="password"type="password" placeholder="Contraseña">
					@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
					@endif								

				</div>
				<div class="form-group btn-container">
					<button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Ingresar</button>
				</div>

			</form>
		</div>
	</section>
	<!-- Essential javascripts for application to work-->
    <script src="http://nezco.com.ve/public/js/jquery-3.2.1.min.js"></script>
    <script src="http://nezco.com.ve/public/js/popper.min.js"></script>
    <script src="http://nezco.com.ve/public/js/bootstrap.min.js"></script>
    <script src="http://nezco.com.ve/public/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="http://nezco.com.ve/public/js/plugins/pace.min.js"></script>
    <script src="http://nezco.com.ve/public/tinymce/tinymce.min.js"></script>

    <!-- Page specific javascripts-->
    <script type="text/javascript" src="http://nezco.com.ve/public/js/plugins/chart.js"></script>

	<script type="text/javascript">
      // Login Page Flipbox control
      //$('.login-content [data-toggle="flip"]').click(function() {
      	//$('.login-box').toggleClass('flipped');
      	//return false;
     // });
  </script>
</body>
</html>







