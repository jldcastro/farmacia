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
    <div class="col-md-7 col-lg-7 col-sm-7">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Cambiar mi Contraseña</h1>
            </div>
            <form class="user" method="POST" action="{{url('updatepassword')}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="form-group" {{ $errors->has('mypassword') ? 'has-error' :'' }}>
                    <input type="password" class="form-control form-control-user" name="mypassword" placeholder="Introduce tu contraseña actual">
                </div>
                @if ($errors->has('mypassword'))
                    <span class="help-block">
                        <p style="color: #e74a3b; text-align: center">{{ $errors->first('mypassword') }}</p>
                    </span>
                @endif
                <div class="form-group" {{ $errors->has('password') ? 'has-error' :'' }}>
                    <input type="password" class="form-control form-control-user" name="password" placeholder="Introduce la nueva contraseña">
                    @if ($errors->has('password'))
                        <span class="help-block">
                                <p style="color: #e74a3b; text-align: center">{{ $errors->first('password') }}</p>
                            </span>
                    @endif
                </div>
                <div class="form-group" {{ $errors->has('password_confirmation') ? 'has-error' :'' }}>
                    <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Confirma la nueva contraseña">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                                <p style="color: #e74a3b; text-align: center">{{ $errors->first('password_confirmation') }}</p>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Cambiar contraseña" />
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="js/dataTable_espanol.js"></script>
@endsection