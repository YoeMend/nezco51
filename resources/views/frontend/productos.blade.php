@extends ('frontend.layaut')
 
@section('title', "Suministros -")

@section('tit-cabecera', "SUMINISTROS DE EQUIPOS Y SISTEMAS DE SEGURIDAD Y PROTECCIÓN")

@section ('cabecera')
	@include ('frontend.cabecera')
@endsection

@section ('content')


	<div class="container">
		<div class="row">

			<div class="col-lg-12">
					<div class="form-group col-lg-4 col-md-6 offset-md-6 offset-lg-8 p-0">
						<form action="" accept-charset="UTF-8">
							<input type="text" class="form-control" placeholder="Buscar">
						</form> 
					</div>
			</div>

			<div class=" filter col-lg-2 ">

				<nav id="filter" class="navbar navbar-expand-lg navbar-light bg-white p-0">
				  <a class="navbar-brand c-black invisible" id="cg" href="#">Filtros</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>

				  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				    <ul class="navbar-nav flex-column list-group mr-auto mt-2 mt-lg-0 w-100">
				    	<div class="row">

					{{-- @foreach($categorias_productos as $categoria) --}}
					@foreach($categorias_productos as $categoriap)
				      <li class="nav-item col-12 col-md-6 col-lg-12 mt-1 px-1">
					       <button class="btn w-100 btn-primary text-left" type="button" data-toggle="collapse" data-target="#{{ $categoriap->id }}" aria-expanded="false" aria-controls="collapseExample">
								{{ $categoriap->descripcion }}
							</button>
						
							<div class="collapse" id="{{ $categoriap->id }}">
						  		<div class=" card-body pt-0">
						  			@foreach ($productos as $producto)
						  			@if ($producto->categoria_producto_id == $categoriap->id)
						  			{{-- ENLACE --}}
								    <a id="filter_item" href="productos_detail/{{ $producto->id }}" >
								    	{{ $producto->titulo }}
								    </a>
								    <hr class="mt-0">
						  			@endif	
						  			@endforeach
								</div>
							</div>
				      </li>
					 @endforeach
				   
				      </div>
				     
				    </ul>
				   
				  </div>
				</nav>
			
			</div>
		<div class="col p-0 m-0">		
			<div class="cards">
				{{-- TARJETA --}}
				@foreach($productos as $producto )	
				<div class="card">
					<div class="py-2 border-bottom">
						<img src="{{ asset('img/productos/'.$producto->imagen) }}" alt="" class="img-fluid">
						<div class="">
							{{-- ENLACE --}}
							<a class="c-vino" href="productos_detail/{{ $producto->id }}">
								<h5 class="font-italic pt-3 pt-lg-2 ">{{ $producto->titulo }}</h5>
						</a>
						<?php	 
							$length = 100;
						    $stringDisplay = substr($producto->descripcion, 0, $length);

						    if (strlen($stringDisplay) > $length - 1) {
						    	 $stringDisplay.="...";
						    }

						?>
								<?= $stringDisplay; ?>
							
							{{-- @foreach ($tipo_productos as $tipo)
						  		@if ($tipo->id == $producto->tipo_producto_id)

								<p class=" mt-2">{{ $tipo->descripcion }}</p>
							
								@endif
							@endforeach --}}

							<div class="col text-right pt-3 ">
								{{-- ENLACE --}}
					   			<a class="font-italic enlaces " href="productos_detail/{{ $producto->id }}">Ver más</a>
					    	</div>
						</div>
					</div>
	    		</div>
	    		@endforeach
	    		{{-- FIN TARJETA --}}
	  		</div>	
		</div>			
	</div>
</div>

	<script src="{{ asset('js/minigrid.min.js') }}"></script>
	<script>

    (function(){
  		var grid;
  		function init() {
		    grid = new Minigrid({
		      container: '.cards',
		      item: '.card',
		      gutter: 18
		    });
		    grid.mount();
		}
  
	  // mount
	  function update() {
	    grid.mount();
	  }

	document.addEventListener('DOMContentLoaded', init);
	window.addEventListener('resize', update);

	})();

	</script>
@endsection
