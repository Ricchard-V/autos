<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class landingRequest extends FormRequest
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

    public function messages()
    {
        return [
            'habeas.required' => 'Por favor autorize el tratamiento de datos personales para continuar',
            'documento.numeric' =>'Revisa tu Documento de identidad, solo debe contener numeros',
            'documento.unique' =>'Tu numero de Documento ya esta participando',
            'celular.unique' =>'Tu numero de Celular ya esta participando',
            'celular.numeric' =>'Revisa tu numero de celular, solo debe contener numeros',

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required',
            'apellido' => 'required',
            'documento' => 'required|unique:clientes|numeric',
            'departamento' => 'required',
            'ciudad' => 'required',
            'celular' => 'required|unique:clientes|numeric',
            'email' => 'required|unique:clientes',
            'habeas' => 'required',
        ];
    }
}
