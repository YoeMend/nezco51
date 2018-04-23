{{-- SERVICIOS --}}
	<div class="container-fluid p-4  p-lg-5 bg-white ">
		
			<div class="row my-lg-5">
				<div class="col-12 text-center">
					<h1 class="tit">CAPACITACIÓN Y PERFECCIONAMIENTO DEL TALENTO HUMANO</h1>
				</div>
				<div class="col my-lg-5 mt-lg-4">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					
					  <div class="carousel-inner align-items-center">

					  	<?php
						$longitud = count($servicios);
						?>
					@for($i=0; $i<$longitud; $i++)

						<?php	 
							$length = 150;
						    $stringDisplay = substr($servicios[$i]->descripcion, 0, $length);

						    if (strlen($stringDisplay) > $length - 1) {
						    	 $stringDisplay.="...";
						    }

						?>

						@if($i == 0)
						    <div class="carousel-item active mt-5">
						    	<div class="row align-items-center justify-content-around">
						    		<div class="col-lg-5 col-md-5">
						    			<h3 class="font-italic">{{ $servicios[$i]->titulo }} </h3>

						    			<?= $stringDisplay; ?>
						    			

						    			<div class="col text-right">
						    				<a class="font-italic enlaces " href="servicios_detail/2/{{ $servicios[$i]->id }}">Más Información</a>
						    			</div>
						    			
						    			
						    		</div>
						    		<div class="col-lg-5 col-md-5 mt-3 mt-lg-0 h-360px overflow-hidden" >
						    			<img class="d-block img-fluid h-100" src="{{ asset('img/servicios/'.$servicios[$i]->imagen) }}" alt="{{ $servicios[$i]->titulo }} ">
						    		</div>
						    	</div>
						    </div>
						@endif
						@if($i > 0)
						    <div class="carousel-item mt-5">
						    	<div class="row align-items-center justify-content-around">
						    		<div class="col-lg-5 col-md-5">
						    			<h3 class="font-italic">{{ $servicios[$i]->titulo }} </h3>

						    			<?= $stringDisplay; ?>

						    			<div class="col text-right">
						    				<a class="font-italic enlaces " href="servicios_detail/2/{{ $servicios[$i]->id }}">Más Información</a>
						    			</div>
						    			
						    			
						    		</div>
						    		<div class="col-lg-5 col-md-5 mt-3 mt-lg-0 h-360px  overflow-hidden" >
						    			<img class="d-block img-fluid h-100" src="{{ asset('img/servicios/'.$servicios[$i]->imagen) }}" alt="{{ $servicios[$i]->titulo }} ">
						    		</div>
						    	</div>
						    </div>
						@endif
					@endfor

					  </div>
					  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					    <span class="fa fa-angle-left c-black font-weight-bold position-absolute icon-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					    <span class="fa fa-angle-right c-black font-weight-bold position-absolute icon-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
			</div>
		
	</div>