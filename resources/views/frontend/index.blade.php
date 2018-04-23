@extends ('frontend.layaut')

@section ('cabecera')

	@include ('frontend.sectionFront.video')

@endsection

@section ('content')

	{{-- NOSOTROS --}}
	<div class="container py-lg-5 my-lg-5">
		<div class="row justify-content-around align-items-center py-lg-5">
			<div data-scroll="toggle(.fromLeftIn, .fromLeftOut)" class=" col-6 col-lg-4 col-md-3 pt-3 pt-md-0">
				<img src="{{ asset('images/LogoNezco.svg') }}" class="img-fluid" alt="">
			</div>

			<div data-scroll="toggle(.fromRightIn, .fromRightOut)" class="text-lg-right col-lg-6 col-md-6 my-lg-0 my-5">
				
				<h4>Sembradores de la cultura preventiva.</h4>
				<h4>Líderes en Seguridad y Salud Laboral.</h4>
				<h4>Productos y servicios pensados para satisfacer las necesidades del trabajador venezolano.</h4><br><br>
			
				<h1 class="tit text-lg-right text-center"><b>¡GENERANDO CALIDAD DE VIDA! </b></h1>

			</div>
		</div>
	</div>

@endsection

@section ('img-float')

	{{-- VALORES --}}
	<div class="container-fluid p-4 p-lg-5  bg-fixed" style="background-image: url('{{ asset('images/fondoValores.png') }}');">
		<div class="container py-lg-5">
			<div class="row py-lg-5 ">
				<div data-scroll="toggle(.fromTopIn, .fromTopOut)" class="col-12 text-center"> <h1 class="tit c-white py-lg-5">NUESTROS VALORES</h1></div>
				<div data-scroll="toggle(.fromTopIn, .fromTopOut)" class="col c-white text-center m-1">
					<div class="row justify-content-center">
						<img src="{{ asset('images/responsabilidad.png') }}" alt="">
						<h3 class="col-12 font-italic c-white">Responsabilidad</h3>
						
					</div>
				</div>
				<div data-scroll="toggle(.fromTopIn, .fromTopOut)" class="col c-white text-center m-1">
					<div class="row justify-content-center">
						<img src="{{ asset('images/solidaridad.png') }}" alt="">
						<h3 class="col-12 font-italic c-white">Solidaridad</h3>
						
					</div>
				</div>
				<div data-scroll="toggle(.fromTopIn, .fromTopOut)" class="col c-white text-center m-1">
					<div class="row justify-content-center">
						<img src="{{ asset('images/innovacion.png') }}" alt="">
						<h3 class="col-12 font-italic c-white">Innovación</h3>
						
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section ('etc')

	@include ('frontend.sectionFront.servicios')
	@include ('frontend.sectionFront.productos')
	@include ('frontend.sectionFront.twitter')
	@include ('frontend.sectionFront.clientes')

	<script>
	window.counter = function() {
		// this refers to the html element with the data-scroll-showCallback tag
		var span = this.querySelector('span');
		var current = parseInt(span.textContent);

		span.textContent = current + 1;
	};

	document.addEventListener('DOMContentLoaded', function(){
	  var trigger = new ScrollTrigger({
		  addHeight: true
	  });
	});
</script>

@endsection