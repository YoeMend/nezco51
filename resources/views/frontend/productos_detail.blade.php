@extends ('frontend.layaut')
 
@section('title', "Suministros -")

@section('tit-cabecera', "SUMINISTROS DE EQUIPOS Y SISTEMAS DE SEGURIDAD Y PROTECCIÓN")

@section ('cabecera')
	@include ('frontend.cabecera')
@endsection

@section ('content')


	<div class="container">
		<div class="row">


			<div class=" filter col-lg-2 ">

				<nav id="filter" class="navbar navbar-expand-lg navbar-light bg-white p-0">
				  <a class="navbar-brand c-black invisible" id="cg" href="#">Filtros</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>

				  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				    <ul class="navbar-nav flex-column list-group mr-auto mt-2 mt-lg-0 w-100">
				    	<div class="row">
				   
				    		
				      <li class="nav-item active col-12 col-md-6 col-lg-12 mt-1 px-1">

					       <button class="btn w-100 btn-primary text-left" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">

								{{ $producto_categoria->descripcion }}
							
							</button>
						
							<div class="collapse" id="collapseExample">
						  		<div class=" card-body pt-0">
						  			@foreach ($productos_filter as $productof)

							  			@if ($productof->categoria_producto_id == $producto_categoria->id)
							  			
									    <a id="filter_item" href="productos_detail/{{ $productof->id }}" >
									    	{{ $productof->titulo }}
									    </a>
									    <hr class="mt-0">
							  			@endif	

						  			@endforeach

								</div>
							</div>

				      </li>

				 

				    
				      </div>
				     
				    </ul>
				   
				  </div>
				</nav>
			
			</div>
			{{-- Fin Filtro

			Content --}}
			<div class="col-lg-10">
				<div class="row align-items-start">

					<div class="col-12">
						<h1>{{ $producto->titulo }}</h1>
					</div>

					<div class="col-12 py-3 px-4 border-bottom" >
						<div class="row align-items-center">
							<div class="col-lg-12">
							
									<?= $producto->descripcion; ?>
							
								<div class="col mb-3">

									@foreach ($tipos_producto as $tipos)

							  			@if ($tipos->id == $producto->tipo_producto_id)
							  			
									    <p class="btn btn-primary mt-2">{{ $tipos->descripcion }} </p>

									    <hr class="mt-0">
							  			@endif	

						  			@endforeach
									
								</div>
							</div>
							<div class="col-lg-12">

								<ul id="lightgallery" class=" col cards cards-galery text-center list-unstyled row">

									
									<li class=" card py-2" data-responsive="{{ asset('img/productos/'.$producto->imagen) }}" data-src="{{ asset('img/productos/'.$producto->imagen) }}" data-sub-html="{{ $producto->titulo }}" {{-- data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1" --}}>
									<a href="">
				                      <img src="{{ asset('img/productos/'.$producto->imagen) }}" alt="{{ $producto->titulo }}" class="img-fluid">
				                    </a>

					                @foreach($imagenes as $imagen)
					                <li class=" card py-2" data-responsive="{{ asset('img/productos/'.$imagen->url) }}" data-src="{{ asset('img/productos/'.$imagen->url) }}" data-sub-html="{{ $imagen->nombre }}" {{-- data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1" --}}>
					                    <a href="">
					                        <img class="img-fluid" src="{{ asset('img/productos/'.$imagen->url) }}" alt="{{ $imagen->nombre }}">
					                    </a>
					                </li>
					                @endforeach

					            </ul>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src="{{ asset('public/js/lightgallery.js') }}"></script>
         <script src="{{ asset('public/js/minigrid.min.js') }}"></script>
        <script>
            lightGallery(document.getElementById('lightgallery'));
        </script>

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
