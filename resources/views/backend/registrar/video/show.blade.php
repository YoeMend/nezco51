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
		<h1><i class="fa fa-dashboard"></i> Presentación Video</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<?php $url = 'videosb/index/'.$categoria.'/'.$tipo;?>
		<li class="breadcrumb-item active"><a href="{{ url($url) }}">Atrás</a></li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			
 <form name="form1" class="row"  enctype="multipart/form-data" method="POST" action="" accept-charset="UTF-8"><input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
               
				<div class="form-group col-md-1">
					<label class="control-label">Categoria</label>
					<input class="form-control" type="text" name="categoria_imagen_id" id="categoria_imagen_id" value="{{ $categoria }}" readonly="">
				</div>
				<div class="form-group col-md-1">
					<label class="control-label">Tipo</label>
					<input class="form-control" type="text" name="tipo_id" id="tipo_id" value="{{ $tipo }}" readonly="">

				</div>
				<div class="form-group col-md-8">
					<label class="control-label">Detalles</label>
					<input class="form-control" type="text" name="texto" id="tipo_id" value="{{ $texto }}" readonly="">

				</div>

				<div class="form-group col-md-6">
					<label class="control-label">Nombre</label>
					<input class="form-control" type="text" name="nombre" value="{{ $video->nombre }}" id="nombre" placeholder="Nombre" readonly="">
				</div>
				<div class="form-group col-md-1">
					<label class="control-label">Público</label>
					<select id="publico"  name="publico" class="form-control" readonly>	
                        <option value="">Seleccione</option>
                        <option value="Si"@if(old('publico', $video->publico)=='Si') selected @endif>Si</option>
                        <option value="No"@if(old('publico', $video->publico)=='No') selected @endif>No</option>
                    </select>
				</div>
				<div class="form-group col-md-6">
                  <div class="form-group">
					<label>Video Cargado</label>
						<p>
                  	<video src="{{ asset('public/video/empresa/'.$video->url) }}" class="video_home"  loop muted preload autoplay poster=""></video></p>


					

                 </div>
				</div>

			</div>
			<div class="tile-footer">

<?php 
							$url = 'videosb/index/'.$categoria.'/'.$tipo;?>
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
       
        //Obtenemos la imagen del campo "file". 
      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('video.*')) {
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
