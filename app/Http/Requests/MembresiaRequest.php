<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembresiaRequest extends FormRequest
{
    public function authorize()
    {
        // Puedes poner lógica de permisos aquí, por ahora true
        return true;
    }

    public function rules()
    {
        return [
            'cliente_id' => 'required|exists:clientes,id',
            'tipo' => 'required|in:dia,15dias,mes',
            'fecha_inicio' => 'required|date|after_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'cliente_id.required' => 'Debe seleccionar un cliente.',
            'cliente_id.exists' => 'El cliente seleccionado no existe.',
            'tipo.required' => 'Debe seleccionar un tipo de membresía.',
            'tipo.in' => 'El tipo seleccionado no es válido.',
            'fecha_inicio.required' => 'Debe ingresar la fecha de inicio.',
            'fecha_inicio.after_or_equal' => 'La fecha de inicio debe ser hoy o posterior.',
        ];
    }
}
