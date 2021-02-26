<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:25|confirmed',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'rut_usuario' => 'required|cl_rut|unique:users',
            'telefono' => 'required',
            'unidad_trabajo' => 'required',
            'cargo_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'rut_usuario.required' => 'Debe ingresar algún rut',
            'rut_usuario.cl_rut' => 'El rut ingresado no es válido',
            'rut_usuario.unique' => 'El rut del usuario ya fue registrado en el sistema',
            'rut_usuario.unique_with' => 'La combinación de rut y cargo ya fue registrado en el sistema',
            'name.required' => 'Los nombres son obligatorios',
            'apellido_paterno.required' => 'El apellido paterno es obligatorio',
            'apellido_materno.required' => 'El apellido materno es obligatorio',
            'email.required' =>'Debe ingresar algún email',
            'email.email' => 'Este email ya fue registrado en el sistema',
            'password.required' => 'Debe ingresar alguna contraseña',
            'telefono.required' => 'Debe ingresar algún número de teléfono',
            'unidad_trabajo.required' => 'Debe ingresar alguna Unidad de Trabajo',
            'cargo_id' => 'Debe seleccionar algún cargo hospital',
        ];
    }
}
