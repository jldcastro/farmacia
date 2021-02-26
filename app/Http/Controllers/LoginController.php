<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function index()
    {
        setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
        $now = Carbon::now()->formatLocalized('%A %d %B %Y');
        Carbon::setLocale('es');

        return view('login', compact('now'));
    }

    public function store(LoginRequest $request)
    {
        if(Auth::attempt(['rut_usuario' => $request['rut_usuario'], 'password' => $request['password']])){
            if(Auth::user()->unidad_trabajo=='Administración'){
                if(Auth::user()->estado=='Activo'){
                    return Redirect::to('/home');
                }
                else{
                    return Redirect::to('/login')->with('mensaje2','Usted esta suspendido del sistema');
                }
            }

            else if(Auth::user()->unidad_trabajo=='Farmacia'){
                if(Auth::user()->estado=='Activo'){
                    return "Soy farmacéutico";
                }
                else{
                    return Redirect::to('/login')->with('mensaje2','Usted esta suspendido del sistema');
                }
            }

            else if(Auth::user()->unidad_trabajo=='Personal'){
                if(Auth::user()->estado=='Activo'){
                    return "Soy de personal";
                }
                else{
                    return Redirect::to('/login')->with('mensaje2','Usted esta suspendido del sistema');
                }
            }
        }
        return Redirect::to('/login')->with('mensaje2','Rut y/o contraseña inválidos');

    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/login');
    }
}
