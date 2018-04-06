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
		<h1><i class="fa fa-dashboard"></i> Crear Producto</h1>

	</div>
	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item active"><a href="{{ route('producto.index') }}">Atrás</a></li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			
 <form name="form1" class="row"  enctype="multipart/form-data" method="POST" action="{{route ('producto.store')}}" accept-charset="UTF-8"><input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

				
				<div class="form-group col-md-2">
					<label class="control-label">Código</label>
					<input class="form-control" type="text" name="codigo" id="codigo" placeholder="Codigo" required="">
				</div>
				<div class="form-group col-md-6">
					<label class="control-label">Titulo/Nombre</label>
					<input class="form-control" type="text" name="titulo" id="titulo" placeholder="Título y/o Nombre">
				</div>
				<div class="form-group col-md-10">
					<label class="control-label">Descripción</label>
					<textarea class="form-control" rows="6" name="descripcion" id="descripcion" placeholder="Descripción y/o Detalles"></textarea>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label">Categoría Producto</label>
					<select id="categoria_producto_id"  name="categoria_producto_id" class="form-control" required="">	
						<option value="">Seleccione Categoria Producto</option>
						@foreach ($categoriaproducto as $categ)
						<option value="{{ $categ->id }}">{{ $categ->descripcion }}</option>	
						@endforeach	
					</select>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label">Tipo Producto</label>
					<select id="tipo_producto_id"  name="tipo_producto_id" class="form-control" required="">	
						<option value="">Seleccione Tipo Producto</option>
					</select>
				</div>
				<div class="form-group col-md-1">
					<label class="control-label">Público</label>
					<select id="publico"  name="publico" class="form-control">	
						<option value="">Seleccione</option>
						<option value="Si">Si</option>
						<option value="No">No</option>
					</select>
				</div>
				<div class="form-group col-md-1">
					<label class="control-label">Inicio</label>
					<select id="inicio"  name="inicio" class="form-control">	
						<option value="">Seleccione</option>
						<option value="1">Si</option>
						<option value="0">No</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label">Posición</label>
					<input class="form-control" type="text" name="posicion" id="posicion" placeholder="Posición" maxlength="2">
				</div>
				<div class="form-group col-md-4">
					<label class="control-label">Estatus</label>
					<select id="estatus"  name="estatus" class="form-control">	
						<option value="">Seleccione</option>
						<option value="Activo">Activo</option>
						<option value="Desactivado">Desactivado</option>
					</select>
				</div>

				<div class="form-group col-md-6">
                  <div class="form-group">
					<label>Imagen Principal</label>
					
					<input name="archivo" type="file" id="imagen" accept="image/jpeg, image/png, image/gif" />
                   <output id="list"></output>			

                 </div>
				</div>

			</div>
			<div class="tile-footer">
						<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('producto.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>



					</div>
		</form>

	</div>
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

 

<script>
	var editor_config = {
		path_absolute : "{{ URL::to('/') }}/",
		selector: "textarea",
		plugins: [
		"advlist autolink lists link image charmap print preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks visualchars code fullscreen",
		"insertdatetime media nonbreaking save table contextmenu directionality",
		"emoticons template paste textcolor colorpicker textpattern"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
		relative_urls: false,
		file_browser_callback : function(field_name, url, type, win) {
			var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
			var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
			var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
			if (type == 'image') {
				cmsURL = cmsURL + "&type=Images";
			} else {
				cmsURL = cmsURL + "&type=Files";
			}
			tinyMCE.activeEditor.windowManager.open({
				file : cmsURL,
				title : 'Filemanager',
				width : x * 0.8,
				height : y * 0.8,
				resizable : "yes",
				close_previous : "no"
			});
		}
	};
	tinymce.init(editor_config);
</script>


@endpush 
