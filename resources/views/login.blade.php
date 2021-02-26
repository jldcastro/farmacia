<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/rut_vista.js"></script>
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />

<div class="container" style="border: solid 1px;">
    <div class="row">
        <div class="col-md-12 login-form-2">
            <h3>Sistema Integral de Abastecimiento Hospital de Parral</h3>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4" >

        </div>
        <div class="col-md-4 login-form-2" >
            <h3>Iniciar Sesión</h3>
            @if(Session::has('mensaje2'))
                <div class="form-group text-center">
                    <span style="color:white">{{ Session::pull('mensaje2') }}</span>
                </div>
            @endif

            <form method="POST" action="{{route('login.store')}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="form-group" {{ $errors->has('rut_usuario') ? 'has-error' :'' }}>
                    <input type="text" class="form-control" name="rut_usuario" placeholder="Rut ej. 14234567-8" id="rut" required oninput="checkRut(this)">
                    @if ($errors->has('rut_usuario'))
                        <span class="help-block">
                                <p style="color: white">{{ $errors->first('rut_usuario') }}</p>
                            </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña">
                    @if ($errors->has('password'))
                        <span class="help-block">
                                <p style="color: white;">{{ $errors->first('password') }}</p>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Ingresar" />
                </div>
                <div class="form-group">
                    <a href="#" class="ForgetPwd" value="Login">Olvidó su contraseña?</a>
                </div>
            </form>
        </div>
    </div>
    <br>
</div>
<hr>
<div class="form-group">
    <p style="text-align: center;"><?= $now ?></p>
</div>

