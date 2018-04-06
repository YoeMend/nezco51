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
		<h1><i class="fa fa-dashboard"></i> Cambiar Estatus de Video</h1>
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
			
 <form name="form1" class="row"  enctype="multipart/form-data" method="POST" action="{{ route('videosb.actualizar', $video->id) }}" accept-charset="UTF-8"> <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
          
               {{ method_field('PUT') }}

				<div class="form-group col-md-1">
					<label class="control-label">Categoria</label>
					<input class="form-control" type="text" name="categoria_video_id" id="categoria_video_id" value="{{ $categoria }}" readonly="">
				</div>
				<div class="form-group col-md-1">
					<label class="control-label">Tipo</label>
					<input class="form-control" type="text" name="tipo_id" id="tipo_id" value="{{ $tipo }}" readonly="">

				</div>

				<div class="form-group col-md-6">
					<label class="control-label">Nombre</label>
					<input class="form-control" type="text" name="nombre" id="nombre" value="{{ $video->nombre }}" placeholder="Nombre" readonly="">
				</div>
				<div class="form-group col-md-2">
					<label class="control-label">Público</label>
					<select id="publico"  name="publico" class="form-control">	
                        <option value="">Seleccione</option>
                        <option value="Si"@if(old('publico', $video->publico)=='Si') selected @endif>Si</option>
                        <option value="No"@if(old('publico', $video->publico)=='No') selected @endif>No</option>
                    </select>
				</div>
				<div class="form-group col-md-2">
					<label class="control-label">Inicio</label>
					<select id="inicio"  name="inicio" class="form-control">	
                        <option value="">Seleccione</option>
                        <option value="1"@if(old('inicio', $video->inicio)=='1') selected @endif>Si</option>
                        <option value="0"@if(old('inicio', $video->inicio)=='0') selected @endif>No</option>
                    </select>
				</div>

                <div class="form-group col-md-6">
                  <div class="form-group">
                    <label>Video Actual)</label>
                     
                   <p>
                  	<video src="{{ asset('video/empresa/'.$video->url) }}" class="video_home"  loop muted preload autoplay poster=""></video></p>
                </div>

			</div>
			<div class="form-group col-md-6">
			<div class="tile-footer">
						<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;

			</div>
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
		

		$("#video").change(function(e) {
              archivo(e);           

		});		





});

function archivo(e) {
      var files = e.target.files; // FileList object
       
        //Obtenemos la video del campo "file". 
      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('video.*')) {
                continue;
           }
       
           var reader = new FileReader();
           
           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la video.
                      document.getElementById("list").innerHTML = ['<video src="', e.target.result,'"></video>'].join('');
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
}
             
      //document.getElementById('files').addEventListener('change', archivo, false);
</script>



@endpush 
