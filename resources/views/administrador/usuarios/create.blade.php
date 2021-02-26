@extends('home')
@section('contenido')
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Ingresar nuevo usuario</h1>
            </div>
            <form class="user" method="POST" action="{{route('usuario.store')}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="form-group row">
                    <div class="form-group col-md-6" {{ $errors->has('name') ? 'has-error' :'' }}>
                        <input type="text" class="form-control form-control-user" name="name" placeholder="Nombre">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <p style="color: #e74a3b; text-align: center">{{ $errors->first('name') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6" {{ $errors->has('apellido_paterno') ? 'has-error' :'' }}>
                        <input type="text" class="form-control form-control-user" name="apellido_paterno" placeholder="Apellido Paterno">
                        @if ($errors->has('apellido_paterno'))
                            <span class="help-block">
                                <p style="color: #e74a3b; text-align: center">{{ $errors->first('apellido_paterno') }}</p>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-6" {{ $errors->has('apellido_materno') ? 'has-error' :'' }}>
                        <input type="text" class="form-control form-control-user" name="apellido_materno" placeholder="Apellido Materno">
                        @if ($errors->has('apellido_materno'))
                            <span class="help-block">
                                <p style="color: #e74a3b; text-align: center">{{ $errors->first('apellido_materno') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6" {{ $errors->has('rut_usuario') ? 'has-error' :'' }}>
                        <input type="text" class="form-control form-control-user" name="rut_usuario" placeholder="Rut">
                        @if ($errors->has('rut_usuario'))
                            <span class="help-block">
                                <p style="color: #e74a3b; text-align: center">{{ $errors->first('rut_usuario') }}</p>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-6" {{ $errors->has('password') ? 'has-error' :'' }}>
                        <input type="password" class="form-control form-control-user" name="password" placeholder="Contraseña">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <p style="color: #e74a3b; text-align: center">{{ $errors->first('password') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6" {{ $errors->has('password_confirmation') ? 'has-error' :'' }}>
                        <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Confirmar Contraseña">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <p style="color: #e74a3b; text-align: center">{{ $errors->first('password_confirmation') }}</p>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-6" {{ $errors->has('email') ? 'has-error' :'' }}>
                        <input type="email" class="form-control form-control-user" name="email" placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <p style="color: #e74a3b; text-align: center">{{ $errors->first('email') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6" {{ $errors->has('telefono') ? 'has-error' :'' }}>
                        <input type="text" class="form-control form-control-user" name="telefono" placeholder="Teléfono">
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
                    <input type="submit" class="btn btn-primary col-md-offset-1" style="margin-left: 40%;" value="Guardar" />
                </div>
            </form>

        </div>
    </div>
@endsection









