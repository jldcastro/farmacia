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
            <h6 class="m-0 font-weight-bold text-primary">Lista de Cargos de Trabajo</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(count($cargos)>0)
                    <table class="table table-bordered" id="cargo" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cargos as $cargo)
                            <tr>
                                <td>{{$cargo->id}}</td>
                                <td>{{$cargo->nombre}}</td>
                                <td>{{$cargo->estado}}</td>
                                <td>
                                    <a href="{{ route('cargo.edit', $cargo->id) }}" class="btn btn-success btn-circle btn-xs"><i class="fas fa-edit"></i></a>
                                    @if($cargo->estado == 'Activo')
                                        <a href="" data-target="#modal-delete-{{$cargo->id}}" data-toggle="modal" class="btn btn-danger btn-circle btn-xs"><i class="fas fa-trash"></i></a>
                                    @elseif($cargo->estado == 'Suspendido')
                                        <a href="" data-target="#modal-delete-{{$cargo->id}}" data-toggle="modal" class="btn btn-primary btn-circle btn-xs"><i class="fas fa-check"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @if($cargo->estado == 'Activo')
                                @include('administrador.cargo.modal')
                            @elseif($cargo->estado == 'Suspendido')
                                @include('administrador.cargo.modal2')
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <br/><div class='alert alert-warning'><label>No existe ningún cargo dentro de la lista</label></div>
                @endif
                <div class="form-group has-feedback">
                    <button class="btn btn-primary col-md-offset-5"><a href="{!!URL::to('/cargo/create') !!}" style="color: #ffffff">Agregar Cargo Trabajo</a></button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="js/dataTable_espanol.js"></script>
@endsection
