@extends('home')
@section('contenido')
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Editar usuario</h1>
            </div>
            <form class="user" method="POST" action="{!! route('usuario.update', $usuario->id) !!}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input name="_method" type="hidden" value="PUT">
                <div class="form-group row">
                    <div class="form-group col-md-6" {{ $errors->has('name') ? 'has-error' :'' }}>
                        <input type="text" class="form-control form-control-user" name="name" placeholder="Nombre" value="{{$usuario->name}}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <p style="color: #e74a3b; text-align: center">{{ $errors->first('name') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6" {{ $errors->has('apellido_paterno') ? 'has-error' :'' }}>
                        <input type="text" class="form-control form-control-user" name="apellido_paterno" placeholder="Apellido Paterno" value="{{$usuario->apellido_paterno}}">
                        @if ($errors->has('apellido_paterno'))
                            <span class="help-block">
                                <p style="color: #e74a3b; text-align: center">{{ $errors->first('apellido_paterno') }}</p>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-6" {{ $errors->has('apellido_materno') ? 'has-error' :'' }}>
                        <input type="text" class="form-control form-control-user" name="apellido_materno" placeholder="Apellido Materno" value="{{$usuario->apellido_materno}}">
                        @if ($errors->has('apellido_materno'))
                            <span class="help-block">
                                <p style="color: #e74a3b; text-align: center">{{ $errors->first('apellido_materno') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6" {{ $errors->has('telefono') ? 'has-error' :'' }}>
                        <input type="text" class="form-control form-control-user" name="telefono" placeholder="Teléfono" value="{{$usuario->telefono}}">
                        @if ($errors->has('telefono'))
                            <span class="help-block">
                                <p style="color: #e74a3b; text-align: center">{{ $errors->first('telefono') }}</p>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-6" {{ $errors->has('unidad_trabajo') ? 'has-error' :'' }}>
                        <label>Unidad trabajo</label>
                        <select class="form-control" id="unidad_trabajo" name="unidad_trabajo">
                            <option value="0" selected="true" disabled="true">Seleccione</option>
                            <option value="Administración">Administración</option>
                            <option value="Farmacia">Farmacia</option>
                            <option value="Personal">Personal</option>
                        </select>
                        @if ($errors->has('unidad_trabajo'))
                            <span class="help-block">
                                <p style="color: #e74a3b; text-align: center">{{ $errors->first('unidad_trabajo') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6" {{ $errors->has('cargo_id') ? 'has-error' :'' }}>
                        <label>Cargo en el Hospital</label>
                        <select class="form-control" id="cargo_id" name="cargo_id">
                            <option value="0" selected="true" disabled="true">Seleccione</option>
                            @foreach($cargos as $key =>$cargo)
                                <option value="{!!$key!!}">{!!$cargo!!}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('cargo_id'))
                            <span class="help-block">
                                <p style="color: #e74a3b; text-align: center">{{ $errors->first('cargo_id') }}</p>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary col-md-offset-1" style="margin-left: 40%;" value="Actualizar" />
                </div>
            </form>

        </div>
    </div>
@endsection









