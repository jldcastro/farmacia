<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioUpdateRequest extends Request
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
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'telefono' => 'required',
            'unidad_trabajo' => 'required',
            'cargo_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Los nombres son obligatorios',
            'apellido_paterno.required' => 'El apellido paterno es obligatorio',
            'apellido_materno.required' => 'El apellido materno es obligatorio',
            'telefono.required' => 'Debe ingresar algún número de teléfono',
            'unidad_trabajo.required' => 'Debe ingresar alguna Unidad de Trabajo',
            'cargo_id' => 'Debe seleccionar algún cargo hospital',
        ];
    }
}
