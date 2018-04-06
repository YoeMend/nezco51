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
        <h1><i class="fa fa-dashboard"></i>Ficha Tipo de Producto</h1>

    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active"><a href="{{ route('tipoproducto.index') }}">Atrás</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-6">
      <div class="tile">
        <div class="tile-body">

            <form class="form-horizontal" role="form" action=" " method="">
             {{ csrf_field() }}
             
             <div class="form-group">
                <label class="control-label">Descripción</label>
                <input type="text" id="descripcion" name="descripcion" value="{{ $tipoproducto->descripcion }}" class="form-control" placeholder="Descripción" data-toggle="tooltip" data-placement="bottom" readonly="">
            </div>
            <div class="tile-body">
                <label class="control-label">Categoria Producto</label>
                <div class="col-sm-4">
                    <select id="categoria_producto_id"  name="categoria_producto_id" class="form-control" readonly="">  
                        <option value="">Seleccione Categoria Producto</option>
                        @foreach ($categoriaproducto as $categ)
                           <option value="{{ $categ->id }}"@if(old('categoria_producto_id', $tipoproducto->categoria_producto_id)==$categ->id) selected @endif>{{ $categ->descripcion }}</option>

                        @endforeach 
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label">Estatus</label>
                <div class="col-sm-4">
                    <select id="estatus" class="form-control" readonly="">  
                        <option value="">Seleccione Estatus</option>
                        <option value="Activo"@if(old('estatus', $tipoproducto->estatus)=='Activo') selected @endif>Activo</option>
                        <option value="Desactivado"@if(old('estatus', $tipoproducto->estatus)=='Desactivado') selected @endif>Desactivado</option>
                    </select>
                </div>
            </div>
            <div class="tile-footer">
<a class="btn btn-secondary" href="{{ route('tipoproducto.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>

           </div>

       </form>
   </div>
</div>
</div>

</div>

@endsection