{{-- CLIENTES --}}
		<div class="container-fluid py-5 bg-white">
			<div class="container">
				<div class="col-12 text-center tit mb-3"><h1>NUESTROS CLIENTES</h1></div>
				<div class="row ">
					<div  class="col-12 col-md-6 my-2">
						<div class="row justify-content-around ">
							<div class="col-12 col-md-10 px-0">
								<video class="video" controls="" src="{{ asset('public/videos/client1.mp4') }}""></video>
							</div>
							<div class="col-12 col-md-10 mt-3">
								<p class="font-italic px-2">
									"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas consequuntur consectetur deserunt ea voluptate, quod possimus modi et id magnam reprehenderit eaque deleniti accusantium quam quo maxime. Labore, delectus, ab."
								</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 my-2">
						<div class="row justify-content-around">
							<div class="col-12 col-md-10 px-0">
								<video class="video" controls="" src="{{ asset('public/videos/client2.mp4') }}""></video>
							</div>
							<div class="col-12 col-md-10 mt-3">
								<p class="font-italic px-2">
									"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas consequuntur consectetur deserunt ea voluptate, quod possimus modi et id magnam reprehenderit eaque deleniti accusantium quam quo maxime. Labore, delectus, ab."
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 my-5">
				<div class="row justify-content-around align-items-center text-center">
					@foreach ($logo_empresa as $logo)
					<div data-scroll="toggle(.fromTopIn, .fromTopOut)" class="col "><img class="img-fluid" src="{{ asset('public/img/empresas/'.$logo->imagen) }}" alt="{{ $logo->nombre }}"></div>
					@endforeach
				</div>
			</div>
		</div>