<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-100">
<head>
	<meta charset="utf-8">
	<title>@yield('title')  Nezco</title>
	<meta name="description" content="description">
	<meta name="author" content="Nezco">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	{{-- MAIN FOR BOOTSTRAP --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/scroll.css') }}">


</head>
<body class="h-100 ">
	<div class="container-fluid h-100 p-0">

		
			{{-- MENU --}}
		<nav class="navbar navbar-expand-lg navbar-light ">
			<div class="container">
				  {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
				  <button class="navbar-toggler text-primary" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon text-primary"></span>
				  </button>

				  <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">

				    <ul class="navbar-nav  mt-2 mt-lg-0 ">
				      <li class="nav-item active">
				        <a class="nav-link" href="{{ route('frontend.index') }}">Inicio <span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="{{ route('frontend.nosotros') }}">Nosotros</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link {{-- disabled --}}" href="{{ route('frontend.servicios') }}">Capacitación</a>
				      </li>
				      <li class="nav-item active">
				        <a class="nav-link" href="{{ route('frontend.productos') }}">Suministros</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="{{ route('frontend.leyes') }}">Leyes</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="{{ route('frontend.galeriaFront') }}">Galería</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" data-toggle="modal" data-target="#exampleModal" href="">Contacto</a>
				      </li>
				    </ul>
				    {{--  <form class="form-inline my-2 my-lg-0">
				      <input class="form-control mr-sm-2" type="search" placeholder="Search">
				      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				    </form>  --}}
				  </div>
			</div>
		</nav>
		{{-- END MENU --}}

		{{-- ======================= --}}

		@yield ('cabecera')

		{{-- CONTENIDO --}}

		<div class="container-fluid p-2 p-lg-5 bg-white">

					@yield('content')

		</div>

		@yield ('img-float')
		@yield ('etc')
		
		{{-- END CONTENIDO --}}
		
		{{-- FOOTER --}}
		<div class="container-fluid p-4 bg-vino">
			<footer>
				<div class="clearfix">
					<div class="col-1 col-md-10 col-lg-auto float-left">
						<div class="row">
							<ul class="nav">
							  <li class="nav-item item-footer">
							    <a class="nav-link active" href="{{ route('frontend.index') }}">Inicio</a>
							  </li>
							  <li class="nav-item item-footer">
							    <a class="nav-link" href="{{ route('frontend.nosotros') }}">Nosotros</a>
			 				 </li>
							  <li class="nav-item item-footer">
							    <a class="nav-link" href="{{ route('frontend.servicios') }}">Capacitación</a>
							    	{{-- <ul class="nav flex-column  sub-item-footer">
							    		<li class="nav-item pl-2">
											<a class="nav-link" href="">Capacitación</a>
							    		</li>
							    		<li class="nav-item pl-2">
											<a class="nav-link" href="">Capacitación</a>
							    		</li>
							    		<li class="nav-item pl-2">
											<a class="nav-link" href="">Capacitación</a>
							    		</li>
							    	</ul> --}}
							  </li>
							  <li class="nav-item item-footer">
							    <a class="nav-link" href="{{ route('frontend.productos') }}">Suministros</a>
							    	{{-- <ul class="nav flex-column sub-item-footer">
							    		<li class="nav-item pl-2">
											<a class="nav-link" href="">Suministros</a>
							    		</li>
							    		<li class="nav-item pl-2">
											<a class="nav-link" href="">Suministros</a>
							    		</li>
							    		<li class="nav-item pl-2">
											<a class="nav-link" href="">Suministros</a>
							    		</li>
							    		<li class="nav-item pl-2">
											<a class="nav-link" href="">Suministros</a>
							    		</li>
							    		<li class="nav-item pl-2">
											<a class="nav-link" href="">Suministros</a>
							    		</li>
							    		<li class="nav-item pl-2">
											<a class="nav-link" href="">Suministros</a>
							    		</li>
							    	</ul> --}}
							  </li>
							  <li class="nav-item item-footer">
							    <a class="nav-link" href="{{ route('frontend.leyes') }}">Leyes</a>
							    	{{-- <ul class="nav flex-column sub-item-footer">
							    		<li class="nav-item pl-2">
											<a class="nav-link" href="">Leyes</a>
							    		</li>
							    		<li class="nav-item pl-2">
											<a class="nav-link" href="">Leyes</a>
							    		</li>
							    		<li class="nav-item pl-2">
											<a class="nav-link" href="">Leyes</a>
							    		</li>
							    	</ul> --}}
							  </li>
							  <li class="nav-item item-footer">
							    <a class="nav-link" href="{{ route('frontend.galeriaFront') }}">Galería</a>
							  </li>
							  <li class="nav-item item-footer">
							    <a class="nav-link" href="#">Contacto</a>
							  </li>
							</ul>
						</div>
					</div>
					<div class="col-4 col-md-2 col-lg-1 sticky-top pt-3  float-right">
<<<<<<< HEAD
						<img class="img-fluid" src="{{ asset('public/images/LogoPositivo.svg') }}" alt="">
=======
						<img class="img-fluid" src="{{ asset('images/LogoPositivo.svg') }}" alt="">
>>>>>>> bc102a30696c0eb0eeed5681461c740d81db9a29
					</div>
				</div>


				<div class="container mt-5">
					<div class="row justify-content-center">
						<div class="col-12 col-lg-4 col-md-6">
							<div class="row">
								<div class="col">
									<a href="">
										<img src="{{ asset('public/images/icn-face.svg') }}" alt="" class="img-fluid">
									</a>
								</div>
								<div class="col">
									<a href="">
										<img src="{{ asset('public/images/icn-instagram.svg') }}" alt="" class="img-fluid">
									</a>
								</div>
								<div class="col">
									<a href="">
										<img src="{{ asset('public/images/icn-plus.svg') }}" alt="" class="img-fluid">
									</a>
								</div>
								<div class="col">
									<a href="">
										<img src="{{ asset('public/images/icn-twitter.svg') }}" alt="" class="img-fluid">
									</a>
								</div>
								<div class="col">
									<a href="">
										<img src="{{ asset('public/images/icn-youtube.svg') }}" alt="" class="img-fluid">
									</a>
								</div>
							</div>
						</div>
						<div class="col-12 text-center mt-4 c-white">
							<p>
							Av. Fuerzas Aéreas, C.C. Gravina II, nivel mezzanina, locales 2, 3 y 4. Maracay, estado Aragua. <br>
							Teléfonos: (0243) 219.61.70 / (0243) 233.21.49 / (0424) 356.57.65 <br>
							Sucursal Caracas: (0212) 326.00.40 <br>
							Calle 64 entre Av. 8B y 9 Local No. 8B - 68 <br>
							Sector Tierra Negra, Maracaibo, estado Zulia. <br>
							Teléfonos: (0261) 415.74.37 / (0424) 649.16.00 / (0424) 685.04.51
							</p>
						</div>
					</div>

			</footer>
		</div>
		{{-- END FOOTER --}}

		{{-- CONTACTO --}}

		@include ('frontend.contacto')

	</div>
	

	


@yield('javascript')

    <script src="{{ asset('public/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('public/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/js/main.js') }}"></script>
    <script src="{{ asset('public/js/plugins/pace.min.js') }}"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{ asset('js/plugins/chart.js') }}"></script>
   


</body>
</html>
