@extends ('layouts.header')
@section('content')
<div class="row">
	<div class="col-lg-10">
		@if($notificacion=Session::get('notificacion'))
		<div class="alert alert-success">{{ $notificacion }}</div>
		@endif
		@if($notificacion_error=Session::get('notificacion_error'))
		<div class="alert alert-danger">{{ $notificacion_error }}</div>
		@endif
	</div>
</div>

<div class="app-title">
	<div>
		<h1><i class="fa fa-dashboard"></i> Vista Archivo</h1>

	</div>
	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<?php $url = 'archivo/index'.$iddocumento;?>
		<li class="breadcrumb-item active"><a href="{{ url($url) }}">Atrás</a></li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			
			<form name="form1" class="row"  enctype="multipart/form-data" method="POST" action="" accept-charset="UTF-8"><input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

				<div class="form-group col-md-1">
					<label class="control-label">Documento</label>
					<input class="form-control" type="text" name="categoria_imagen_id" id="documento_id" value="{{ $iddocumento }}" readonly="">
				</div>
				<div class="form-group col-md-8">
					<label class="control-label">Detalles</label>
					<input class="form-control" type="text" name="texto" id="tipo_id" value="{{ $texto }}" readonly="">

				</div>

				<div class="form-group col-md-6">
					<label class="control-label">Nombre</label>
					<input class="form-control" type="text" name="nombre" id="nombre" value="{{ $archivo->nombre }}" placeholder="Nombre" readonly="">
				</div>
				<div class="form-group col-md-1">
					<label class="control-label">Público</label>
					<select id="publico"  name="publico" class="form-control" readonly>	
						<option value="">Seleccione</option>
						<option value="Si"@if(old('publico', $archivo->publico)=='Si') selected @endif>Si</option>
						<option value="No"@if(old('publico', $archivo->publico)=='No') selected @endif>No</option>
					</select>
				</div>
				<div class="form-group col-md-6">
					<div class="form-group">
						<label>Archivo</label>
						<p><iframe src="{{ asset('public/documentos/'.$archivo->url) }}" style="max-width: 100%"></iframe></p>				

						</div>
					</div>


					<div class="tile-footer">

						<?php 	$url = 'archivo/index/'.$iddocumento;?>
						<a class="btn btn-secondary" href="{{ url($url) }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>



					</div>
				</form>

			</div>
		</div>
	</div>

	@endsection
	@push ('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
	integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
	integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<script type="text/javascript" language="javascript">
		$ = jQuery;
		jQuery(document).ready(function () {
			$("select#categoria_producto_id").bind('change', function (event) {

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

					}

				});
				$.ajax({
					type: "GET",
					url: '{{ url('cargatipoproductos') }}',
					data: { id: $(this).val() , _token: '{{csrf_token()}}' },
					success: function (resp){
						console.log(resp);
						$('#tipo_producto_id').html(resp);
					}
				});

			});

			$("input#codigo").bind('change', function (event) {
				var cod = $(this).val();
				zcod = cod.toUpperCase();

				$(this).val(zcod);
			});		

			$("#imagen").change(function(e) {
				archivo(e);           

			});		





		});

		function archivo(e) {
      var files = e.target.files; // FileList object

        //Obtenemos la imagen del campo "file". 
        for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('image.*')) {
           	continue;
           }

           var reader = new FileReader();
           
           reader.onload = (function(theFile) {
           	return function(e) {
               // Creamos la imagen.
               document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
           };
       })(f);

       reader.readAsDataURL(f);
   }
}

      //document.getElementById('files').addEventListener('change', archivo, false);
  </script>



  @endpush 
