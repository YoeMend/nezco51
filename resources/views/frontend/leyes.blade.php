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
			{{-- <div class="col-lg-12">
					<div class="form-group col-md-4 offset-md-8">
						<form action="">
							<input type="text" class="form-control" placeholder="Buscar">
						</form> 
					</div>
			</div> --}}

			<div class="col">
				<div class="row">
					@foreach($categorias_documentos as $categoria)

					<button class="my-2 py-2 col-12 text-left btn btn-primary" type="button" data-toggle="collapse" data-target="#{{ $categoria->id }}" aria-expanded="false" aria-controls="collapseExample">
					{{ $categoria->descripcion }}
					</button>

						<div class="col-12 collapse" id="{{ $categoria->id }}">
						  <div class=" card-body p-0">

						    <table class="table table-striped">
							  <tbody>
							  @foreach($documentos as $documento)

								@if($documento->categoria_documento_id == $categoria->id )
								
							    <tr>
							      <td class="col-9" scope="row">{{ $documento->nombre }}</td>
							      <td class="col-3">
							      	@foreach($archivos as $archivo)
							      		@if($archivo->documento_id == $documento->id)

										<a href="{{ asset('documentos/'.$archivo->url) }}" download>

											<i class="fa fa-download" aria-hidden="true"></i>
										</a>
										@endif
							      	@endforeach

							      		@if($documento->descripcion != 'NULL')
										<a href="documentDetail/{{ $documento->id }}">
											<i class="fa fa-eye" aria-hidden="true"></i>
										</a>
							     		@endif

							     		@if($documento->enlace != 'NULL')
							      			<a href="{{ $documento->enlace }}" target="blank">
												<i class="fa fa-link" aria-hidden="true"></i>
											</a>
										@endif
							      </td>

							    </tr>

							    @endif
							   @endforeach

							  </tbody>
							</table>

						  </div>
						</div>

					@endforeach

				</div>
			</div>

			

		</div>
	</div>

@endsection
