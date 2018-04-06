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
		<h1><i class="fa fa-dashboard"></i> Crear Archivo</h1>

	</div>
	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<?php $url = 'archivo/index/'.$iddocumento;?>
		<li class="breadcrumb-item active"><a href="{{ url($url) }}">Atrás</a></li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			
 <form name="form1" class="row"  enctype="multipart/form-data" method="POST" action="{{route ('archivo.store')}}" accept-charset="UTF-8"><input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
               
				<div class="form-group col-md-1">
					<label class="control-label">Documento</label>
					<input class="form-control" type="text" name="documento_id" id="documento_id" value="{{ $iddocumento }}" readonly="">

				</div>
				<div class="form-group col-md-8">
					<label class="control-label">Detalles</label>
					<input class="form-control" type="text" name="texto" id="tipo_id" value="{{ $texto }}" readonly="">

				</div>

				<div class="form-group col-md-6">
					<label class="control-label">Nombre</label>
					<input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre">
				</div>
				<div class="form-group col-md-1">
					<label class="control-label">Público</label>
					<select id="publico"  name="publico" class="form-control">	
						<option value="">Seleccione</option>
						<option value="Si">Si</option>
						<option value="No">No</option>
					</select>
				</div>
				<div class="form-group col-md-6">
                  <div class="form-group">
					<label>archivo</label>
					
					<input name="archivo" type="file" id="archivo" accept=".pdf">                   <output id="list"></output>			

                 </div>
				</div>

			</div>
			<div class="tile-footer">
						<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;
<?php 
							$url = 'archivo/index/'.$iddocumento;?>
							<a class="btn btn-secondary" href="{{ url($url) }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>



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


		$("#archivo").change(function(e) {
              archivo(e);           

		});		





});

function archivo(e) {
      var files = e.target.files; // FileList object
       
        //Obtenemos la archivo del campo "file". 
      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('pdf.*')) {
                continue;
           }
       
           var reader = new FileReader();
           
           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la archivo.
                      document.getElementById("list").innerHTML = ['<iframe class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
}
             
      //document.getElementById('files').addEventListener('change', archivo, false);
</script>



@endpush 
