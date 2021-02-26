@extends('home')
@section('contenido')
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Ver información usuario</h1>
            </div>
            <form class="user" method="POST" action="{!! route('usuario.update', $usuario->id) !!}">
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control form-control-user" name="name" value="{{$usuario->name}}" disabled="true">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control form-control-user" name="apellido_paterno" value="{{$usuario->apellido_paterno}}" disabled="true">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control form-control-user" name="rut_usuario" value="{{$usuario->rut_usuario}}" disabled="true">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control form-control-user" name="apellido_materno" placeholder="Apellido Materno" value="{{$usuario->apellido_materno}}" disabled="true">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control form-control-user" name="email" placeholder="Email" value="{{$usuario->email}}" disabled="true">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control form-control-user" name="telefono" placeholder="Teléfono" value="{{$usuario->telefono}}" disabled="true">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label>Unidad trabajo</label>
                        @foreach($unidad as $u)
                            <input type="text" class="form-control user" disabled value="<?php echo $u->unidad; ?>">
                        @endforeach
                    </div>
                    <div class="form-group col-md-6">
                        <label>Cargo en el Hospital</label>
                        @foreach($cargo as $c)
                            <input type="text" class="form-control user" disabled value="<?php echo $c->nombre; ?>">
                        @endforeach
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection