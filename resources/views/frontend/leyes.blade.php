@extends ('frontend.layaut')

@section('title', "Leyes -")

@section('tit-cabecera', 'ASESORÍA LEGAL EN LA IMPLEMENTACIÓN DE SISTEMAS DE GESTIÓN')

@section ('cabecera')
	@include ('frontend.cabecera')
@endsection

@section ('content')

	<div class="container">
		<div class="row">

			{{-- BUSCADOR --}}
			<div class="col-lg-12">
					<div class="form-group col-md-4 offset-md-8">
						<form action="">
							<input type="text" class="form-control" placeholder="Buscar">
						</form> 
					</div>
			</div>


			{{-- FIN BUSCADOR --}}

	{{-- ======================
		======================== --}}
	
			{{-- FILTRO --}}
			<div class=" filter col-lg-2 ">
				<nav id="filter" class="navbar navbar-expand-lg navbar-light bg-white p-0">
				  <a class="navbar-brand c-black invisible" id="cg" href="#">Filtros</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				    <ul class=" navbar-nav flex-column list-group mr-auto mt-2 mt-lg-0 w-100">
				    	<div class="row">
							@foreach ($categorias_documentos as $categoria)
								<li class=" tex-dec-none  nav-item col-12 col-md-6 col-lg-12 mt-1 px-1">
							   		<a href="" class="btn w-100 btn-primary text-left">
										{{ $categoria->descripcion }}
									</a>
								</li>
							@endforeach
				    	</div>
				    </ul>	   
				  </div>
				  
				</nav>
			</div>
			{{-- FIN FILTRO --}}

	{{-- ======================
		======================== --}}
		
			<div class="col-12 col-md-12 col-lg-10">
				<div class="row">
					{{-- ITEM --}}
					@foreach($documentos as $documento)
					<div class="item-l col-12 col-md-4 pt-3">
						<div class="h-15em overflow-hidden bg-img" style="background-image: url('{{ asset('images/5.jpg') }}');">
							<div class="item-ley">
								<div class="row text-center px-3 pt-5">
									<div class="col">
										<a href="{{ asset('images/5.jpg') }}" download>
											<i class="fa fa-download" aria-hidden="true"></i>
										</a>
									</div>
									<div class="col">
										<a href="documentDetail/{{ $documento->id }}">
											<i class="fa fa-eye" aria-hidden="true"></i>
										</a>
									</div>
									<div class="col">
										<a href="{{ $documento->enlace }}" target="blank">
											<i class="fa fa-link" aria-hidden="true"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="bg-greyClaro rounded-bottom p-3">
							<h5 class="font-italic ">{{ $documento->nombre }}</h5>
						</div>
					</div>
					@endforeach
					{{-- FIN ITEM --}}

				</div>
			</div>

		</div>
	</div>

@endsection
