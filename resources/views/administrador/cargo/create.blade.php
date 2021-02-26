@extends('home')
@section('contenido')
    <div class="col-md-7 col-lg-7 col-sm-7">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Ingresar nuevo cargo</h1>
            </div>
            <form class="user" method="POST" action="{{route('cargo.store')}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="form-group" {{ $errors->has('nombre') ? 'has-error' :'' }}>
                    <input type="text" class="form-control form-control-user" name="nombre" placeholder="Cargo">
                </div>
                @if ($errors->has('nombre'))
                    <span class="help-block">
                        <p style="color: #e74a3b; text-align: center">{{ $errors->first('nombre') }}</p>
                    </span>
                @endif
                <div class="form-group">
                    <input type="submit" class="btn btn-primary col-md-offset-1" style="margin-left: 40%;" value="Guardar" />
                </div>
            </form>

        </div>
    </div>
@endsection









