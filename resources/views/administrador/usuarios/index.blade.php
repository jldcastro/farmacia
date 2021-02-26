@extends('home')
@section('contenido')
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('mensaje')}}
        </div>
    @endif
    @if(Session::has('mensaje2'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('mensaje2')}}
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Usuarios</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(count($usuarios)>0)
                    <table class="table table-bordered" id="usuario" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Rut</th>
                            <th>Cargo</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->id}}</td>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->apellido_paterno}}</td>
                                <td>{{$usuario->rut_usuario}}</td>
                                <td>{{$usuario->cargo->nombre}}</td>
                                <td>{{$usuario->estado}}</td>
                                <td>
                                    <a href="{{ route('usuario.edit', $usuario->id) }}" class="btn btn-success btn-circle btn-xs"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('usuario.show', $usuario->id) }}" class="btn btn-info btn-circle btn-xs"><i class="fas fa-info"></i></a>
                                    @if($usuario->estado == 'Activo')
                                        <a href="" data-target="#modal-delete-{{$usuario->id}}" data-toggle="modal" class="btn btn-danger btn-circle btn-xs"><i class="fas fa-trash"></i></a>
                                    @elseif($usuario->estado == 'Suspendido')
                                        <a href="" data-target="#modal-delete-{{$usuario->id}}" data-toggle="modal" class="btn btn-primary btn-circle btn-xs"><i class="fas fa-check"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @if($usuario->estado == 'Activo')
                                @include('administrador.usuarios.modal')
                            @elseif($usuario->estado == 'Suspendido')
                                @include('administrador.usuarios.modal2')
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <br/><div class='alert alert-warning'><label>No existe ningún usuario dentro de la lista</label></div>
                @endif
                <div class="form-group has-feedback">
                    <button class="btn btn-primary col-md-offset-5"><a href="{!!URL::to('/usuario/create') !!}" style="color: #ffffff">Agregar Usuario</a></button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="js/dataTable_espanol.js"></script>
@endsection

