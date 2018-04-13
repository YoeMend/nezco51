{{-- CLIENTES --}}
		<div class="container-fluid py-5 bg-white">
			<div class="container">
				<div class="col-12 text-center tit mb-3"><h1>NUESTROS CLIENTES</h1></div>
				<div class="row ">

					@foreach($videos_clientes as $videoClient)
						<div  class="col-12 col-md-6 my-2">
							<div class="row justify-content-around ">
								<div class="col-12 col-md-10 px-0">
									<video class="video" controls="" src="{{ asset('video/empresa/'.$videoClient->url) }}""></video>
								</div>
								<div class="col-12 col-md-10 mt-3">
									@foreach($empresas as $empresa)
										@if($empresa->id == $videoClient->tipo_id)
											
												<?= $empresa->descripcion; ?>
											
										@endif
									@endforeach
								</div>
							</div>
						</div>
					@endforeach

				</div>
			</div>
			<div class="col-12 my-5">
				<div class="row justify-content-around align-items-center text-center">
					@foreach ($empresas as $logo)
					<div data-scroll="toggle(.fromTopIn, .fromTopOut)" class="col ">
						<img class="img-fluid col-8" src="{{ asset('img/empresas/'.$logo->imagen) }}" alt="{{ $logo->nombre }}">
					</div>
					@endforeach
				</div>
			</div>
		</div>