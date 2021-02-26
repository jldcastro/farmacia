<?php

namespace App\Http\Controllers;

use App\User;
use App\Cargo;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioCreateRequest;
use App\Http\Requests\UsuarioUpdateRequest;
use App\Http\Requests;
use Session;
use Redirect;
use DB;
use Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class UsuarioController extends Controller
{

    public function password(){

        return view('administrador.usuarios.pass');

    }

    public function updatePassword(Request $request){

        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];

        $messages = [
            'mypassword.required' => 'El campo es requerido contraseña actual es requerido',
            'password.required' => 'El campo contraseña es requerido',
            'password.confirmed' => 'Los passwords no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('password')->withErrors($validator);
        }else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                    ->update(['password' => bcrypt($request->password)]);
                return redirect('/usuario')->with('mensaje', 'Password cambiado con éxito');
            }
            else
            {
                return redirect('/password')->with('mensaje2', 'Credenciales incorrectas');
            }
        }



    }

    public function index()
    {
        $cargos = Cargo::all();
        $usuarios = User::all();
        return view('administrador.usuarios.index')->with("cargos", $cargos)->with("usuarios", $usuarios);
    }

    public function create()
    {
        $cargos = Cargo::orderBy('nombre', 'asc')->pluck('nombre','id');
        $unidad = DB::select('select unidad_trabajo from users');
        return view('administrador.usuarios.create', compact('cargos'))->with("unidad", $unidad);
    }

    public function store(UsuarioCreateRequest $request)
    {
        $usuario=new User();
        $usuario->name = $request->input('name');
        $usuario->email=$request->input("email");
        $usuario->password= bcrypt( $request->input("password") );
        $usuario->apellido_paterno = $request->input('apellido_paterno');
        $usuario->apellido_materno = $request->input('apellido_materno') ;
        $usuario->rut_usuario = $request->input("rut_usuario");
        $usuario->telefono = $request->input("telefono");
        $usuario->unidad_trabajo = $request->input('unidad_trabajo');
        $usuario->cargo_id = $request->input('cargo_id');
        $usuario->estado = 'Activo';
        $usuario->save();

        return redirect('/usuario')->with('mensaje','Usuario registrado exitósamente');
    }

    public function show($id)
    {
        $usuario = User::find($id);
        $cargos = Cargo::orderBy('nombre', 'asc')->pluck('nombre','id');
        $cargo = DB::table('cargo')
            ->join('users', 'cargo.id', '=', 'users.cargo_id')
            ->select('cargo.nombre')
            ->where('users.id','=',$id)
            ->get();
        $unidad = DB::table('users as use')
            ->select('use.unidad_trabajo as unidad')
            ->where('use.id','=',$id)
            ->get();
        return view("administrador.usuarios.show", compact('cargos'))->with("usuario", $usuario)->with("cargo", $cargo)->with("unidad",$unidad);
    }

    public function edit($id)
    {
        $usuario = User::find($id);
        $cargos = Cargo::orderBy('nombre', 'asc')->pluck('nombre','id');
        return view("administrador.usuarios.edit", compact('cargos'))->with("usuario",$usuario);
    }

    public function update(UsuarioUpdateRequest $request, $id)
    {
        $usuario = User::find($id);
        $usuario->name = $request->input('name');
        $usuario->apellido_paterno = $request->input('apellido_paterno');
        $usuario->apellido_materno = $request->input('apellido_materno') ;
        $usuario->telefono = $request->input("telefono");
        $usuario->unidad_trabajo = $request->input('unidad_trabajo');
        $usuario->cargo_id = $request->input('cargo_id');
        $usuario->update();

        Session::flash('mensaje','Información actualizada exitósamente');
        return Redirect::to('/usuario');
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        if($usuario->estado == 'Activo')
        {
            $usuario->estado='Suspendido';
            $usuario->update();
            return Redirect::to('/usuario');
        }
        if($usuario->estado == 'Suspendido')
        {
            $usuario->estado='Activo';
            $usuario->update();
            return Redirect::to('/usuario');
        }
    }

}
