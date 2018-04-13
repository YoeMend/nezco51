{{-- PRODUCTOS --}}
		<div class="container-fluid p-4 p-lg-5 bg-greyClaro ">
			
				<div class="row my-lg-5">
					<div class="col-12 pb-lg-5 text-center">
						<h1 class="tit">SUMINISTROS DE EQUIPOS Y SISTEMAS DE SEGURIDAD Y PROTECCIÓN</h1>
					</div>
					<div class="col my-lg-5 p-0">
						<div id="carouselProductos" class="carousel slide" data-ride="carousel">
						 
						  <div class="carousel-inner align-items-center carousel-inner-productos">
							
						<?php
						$longitud = count($productos);
						?>
						@for($i=0; $i<$longitud; $i++)

						<?php	 
							$length = 150;
						    $stringDisplay = substr($productos[$i]->descripcion, 0, $length);

						    if (strlen($stringDisplay) > $length - 1) {
						    	 $stringDisplay.="...";
						    }

						?>
								@if($i == 0)
							     <div class="carousel-item active my-4">
							    	<div class="row align-items-center justify-content-around">
							    		
							    		<div class="col-12 col-lg-4 col-md-5 mt-3 mt-lg-0">
							    			<div class="img-producto w-100">
							    				<img class="img-fluid h-100" src="{{ asset('public/img/productos/'.$productos[$i]->imagen) }}" alt="First slide">
							    			</div>
							    			<div class="img-producto2 w-100">
							    				<img class="img-fluid w-100" src="{{ asset('public/img/productos/'.$productos[$i]->imagen) }}" alt="First slide">
							    			</div>
							    			
							    			
							    		</div>

							    		<div class="col-12 col-lg-5 col-md-4 mt-5">
							    			<h3 class="font-italic">{{ $productos[$i]->titulo }}</h3>
							    			<?=  $stringDisplay; ?>

							    			<div class="col text-left">
							    				<a class="font-italic enlaces " href="productos_detail/{{ $productos[$i]->id }}">Más Información</a>
							    			</div>
							
							    		</div>
							    	</div>
							    </div>

						   		@endif
						   		@if($i > 0)

							     <div class="carousel-item my-4">
							    	<div class="row align-items-center justify-content-around">
							    		
							    		<div class="col-12 col-lg-4 col-md-5 mt-3 mt-lg-0">
							    			<div class="img-producto w-100">
							    				<img class="img-fluid" src="{{ asset('public/img/productos/'.$productos[$i]->imagen) }}" alt="First slide">
							    			</div>
							    			<div class="img-producto2 w-100">
							    				<img class="img-fluid" src="{{ asset('public/img/productos/'.$productos[$i]->imagen) }}" alt="First slide">
							    			</div>
							    			
							    			
							    		</div>

							    		<div class="col-12 col-lg-5 col-md-4 mt-5">
							    			<h3 class="font-italic">{{ $productos[$i]->titulo }}</h3>
							    			<?=  $stringDisplay; ?>


							    			<div class="col text-left">
							    				<a class="font-italic enlaces " href="productos_detail/{{ $productos[$i]->id }}">Más Información</a>
							    			</div>
							
							    		</div>
							    	</div>
							    </div>
							    @endif

						 @endfor

						  </div>
						  <a class="carousel-control-prev" href="#carouselProductos" role="button" data-slide="prev">
						    <span class="fa fa-angle-left c-black font-weight-bold position-absolute icon-left" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselProductos" role="button" data-slide="next">
						    <span class="fa fa-angle-right c-black font-weight-bold position-absolute icon-right" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>
					</div>
				</div>
			
		</div>