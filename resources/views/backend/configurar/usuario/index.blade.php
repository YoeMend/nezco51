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
        <h1><i class="fa fa-dashboard"></i> Usuarios</h1>

    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active"><a href="{{ route('usuarios.create') }}">Crear</a></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Descripción</th>
                            <th>Estatus</th>
                            <th>Registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td>
                                <a href="{{ route('usuarios.edit', $usuario->id ) }}" title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                <?php 
                                $valor = $usuario->id; 
                                $url="usuarios/cambiar/".$valor; ?>
                                <a href="{{ url($url) }}" title="Cambiar clave"><i class="fa fa-fw fa-key"></i></a>
                                <a href="{{ route('usuarios.destroy',$usuario->id) }}" title="Eliminar Registro" class="uk-icon-link" uk-icon="icon: trash"><i class="fa fa-trash " onclick="return confirm('¿Seguro desea eliminar este registro?')"></i></a>
                            </td>

                            <td><a href="{{ route('usuarios.edit', ($usuario->id) ) }}" title="Editar">{{ $usuario->email }}</a></td>
                            <td><a href="{{ route('usuarios.edit', ($usuario->id) ) }}" title="Editar">{{ $usuario->name }}</a></td>
                            <td>{{ $usuario->created_at }}</td>
                        </tr>
                    @endforeach                </tbody>
                </table>
                <div id="sampleTable_paginate" class="dataTables_paginate paging_simple_numbers">
                    <?php echo $usuarios->render(); ?>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection