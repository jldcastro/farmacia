<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Http\Requests\CargoCreateRequest;
use App\Http\Requests\CargoUpdateRequest;
use App\Http\Requests\CreateCargosRequest;
use App\UnidadTrabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::all();
        return view('administrador.cargo.index')->with("cargos", $cargos);
    }

    public function create()
    {
        return view('administrador.cargo.create');
    }

    public function store(CargoCreateRequest $request)
    {
        $cargo = new Cargo();
        $cargo->nombre=$request->input("nombre");
        $cargo->estado = 'Activo';
        $cargo->save();

    return redirect('/cargo')->with('mensaje','Cargo trabajo registrado exitósamente');
    }

    public function edit($id)
    {
        $cargo = Cargo::find($id);
        return view("administrador.cargo.edit")->with("cargo",$cargo);
    }

    public function update(CargoUpdateRequest $request, $id)
    {
        $cargo = Cargo::find($id);
        $cargo->update($request->all());

        Session::flash('mensaje','Información actualizada exitósamente');
        return Redirect::to('/cargo');
    }

    public function destroy($id)
    {
        $cargo = Cargo::findOrFail($id);
        if($cargo->estado == 'Activo')
        {
            $cargo->estado='Suspendido';
            $cargo->update();
            return Redirect::to('/cargo');
        }
        if($cargo->estado == 'Suspendido')
        {
            $cargo->estado='Activo';
            $cargo->update();
            return Redirect::to('/cargo');
        }
    }
}
