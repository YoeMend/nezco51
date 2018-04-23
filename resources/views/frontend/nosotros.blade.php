@extends ('frontend.layaut')

@section('title', "Nosotros -")

@section('tit-cabecera', "Nosotros")

@section ('content')

	{{-- NOSOTROS --}}
	<div class="container py-lg-5 my-lg-5">
		<div class="row justify-content-around align-items-center pt-lg-5">

			<div class="col-lg-4 col-md-4 col-6 pt-3 pt-md-0">
				<img src="{{ asset('images/LogoNezco.svg') }}" alt="">
			</div>

			<div class="col-lg-6 col-md-6 my-lg-0 my-5">
				<h1 class="tit text-lg-right text-center"><b>FILOSOFÍA</b></h1>
				<p class="text-lg-right text-justify">
					Nuestra filosofía está sustentada en sólidos principios y valores humanistas. Basamos
					nuestra gestión en un genuino compromiso humano, es por eso que tenemos como
					principal objetivo fortalecer la Cultura Preventiva y de Seguridad en las organizaciones. En
					este sentido, fomentamos valores y patrones de conducta que al ponerse en práctica
					dejen en las personas la enseñanza que a través de la prevención protegemos nuestras
					vidas y fortalecemos la salud, lo que por consiguiente nos hace más sanos y por ende más
					productivos. <br>
					<h3 class="text-lg-right"><b>¡Generando así Calidad de Vida!</b></h3>
				</p>
			</div>

		</div>
	</div>

@endsection

@section ('img-float')

	{{-- SEPARADOR --}}
	<div class="container-fluid p-4 p-lg-5 bg-fixed" style="background-image: url('{{ asset('images/fondoValores.png') }}');">
		<div class="container">
			<div class="row ">
				<div class="my-5 py-5"></div>
			</div>
		</div>
	</div>

@endsection

@section ('etc')
	{{-- MISION VISION --}}
	<div class="container-fluid p-4 p-lg-5   bg-white">
		
		<div class="container my-5">
			<div class="row justify-content-around ">
				<div class="text-left col-12 col-lg-9 pb-5 ">
					<h1 class="tit">MISIÓN</h1>
					<p class="">
						Contribuir a salvaguardar la vida de las personas, impactar positivamente el clima
organizacional e impulsar el desarrollo de la Seguridad y Salud Laboral en Venezuela y
Latinoamérica, dejando así una huella positiva en nuestras sociedades, en concordancia
con el verdadero propósito de los convenios, tratados, leyes y normas técnicas referidas a
estas materias..
					</p>
				</div>
				<div class="text-right col-12 col-lg-9 mt-5 pt-5">
					<h1 class="tit">VISIÓN</h1>
					<p class="">
						Consolidarnos como una empresa altamente calificada en el sector de la Seguridad y Salud
Laboral, de esta manera ser una referencia en la contribución orientada a tener una
población más sana, segura y por ende más productiva, lo cual brinde un aporte al
fortalecimiento del sector empresarial de la región y por ende de la sociedad.
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection