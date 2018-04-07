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
        <h1><i class="fa fa-dashboard"></i> Ficha Servicio</h1>

    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active"><a href="{{ route('servicio.index') }}">Atrás</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">

            <form class="row" role="form" enctype="multipart/form-data" action="" method="POST">

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
               
                <div class="form-group col-md-6">
                    <label class="control-label">Titulo/Nombre</label>
                    <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Título y/o Nombre" value="{{ $servicio->titulo }}" readonly="">
                </div>
                <div class="form-group col-md-10">
                    <label class="control-label">Descripción</label>
                    <textarea class="form-control" rows="6" name="descripcion" id="descripcion" placeholder="Descripción y/o Detalles" readonly="">{{ $servicio->descripcion }}</textarea>
                </div>
                <div class="form-group col-md-10">
                    <label class="control-label">Detalles</label>
                    <textarea class="form-control" rows="6" name="detalles" id="detalles" placeholder="Descripción y/o Detalles" readonly="">{{ $servicio->detalles }}</textarea>
                </div>
                <div class="form-group col-md-4">
                    <label class="control-label">Categoría servicio</label>
                    
                    <input class="form-control" type="text" name="categoria_servicio_id" id="categoria_servicio_id" placeholder="Título y/o Nombre" value="{{ $servicio->categoria_servicio_id."-".$descategoria }}" readonly="">
                </div>
                <div class="form-group col-md-1">
                    <label class="control-label">Público</label>
                    <select id="publico"  name="publico" class="form-control" readonly>  
                        <option value="">Seleccione</option>
                        <option value="Si"@if(old('publico', $servicio->publico)=='Si') selected @endif>Si</option>
                        <option value="No"@if(old('publico', $servicio->publico)=='No') selected @endif>No</option>
                    </select>
                </div>
                <div class="form-group col-md-1">
                    <label class="control-label">Inicio</label>
                    <select id="inicio"  name="inicio" class="form-control" readonly>    
                        <option value="">Seleccione</option>
                        <option value="1"@if(old('inicio', $servicio->inicio)=='1') selected @endif>Si</option>
                        <option value="0"@if(old('inicio', $servicio->inicio)=='0') selected @endif>No</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label class="control-label">Posición</label>
                    <input class="form-control" type="text" name="posicion" id="posicion" placeholder="Posición" maxlength="2" value="{{ $servicio->posicion }}" readonly="">
                </div>

                <div class="form-group col-md-6">
                  <div class="form-group">
                    <label>Imagen Principal(Imagen Actual)</label>

                   <p><img src="{{ asset('public/img/servicios/'.$servicio->imagen) }}" style="max-width: 100%"></p>
                                


                    

                </div>
            </div>

        </div>
        <div class="tile-footer">
            <a class="btn btn-secondary" href="{{ route('servicio.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>



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
        $("select#categoria_servicio_id").bind('change', function (event) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });
            $.ajax({
                type: "GET",
                url: '{{ url('cargatiposervicios') }}',
                data: { id: $(this).val() , _token: '{{csrf_token()}}' },
                success: function (resp){
                    console.log(resp);
                    $('#tipo_servicio_id').html(resp);
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
