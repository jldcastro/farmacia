<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CargoCreateRequest extends Request
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
            'nombre' => 'required|unique:cargo,nombre',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del cargo es obligatorio',
        ];
    }
}
