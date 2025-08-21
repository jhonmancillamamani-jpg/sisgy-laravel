<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email|unique:clientes,email,' . ($this->cliente->id ?? ''),
            'telefono' => 'nullable|string|max:20',
            // agrega más reglas según tus campos
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'email.email' => 'Debe ser un correo válido.',
            // agrega más mensajes según tus reglas
        ];
    }
}
