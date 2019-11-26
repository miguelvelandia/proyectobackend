<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'nombre' => 'required|string|min:3|max:255',
            'descripcion' => 'required|string|min:3|max:255',
            'servicio' => 'required|string|min:3',
            'descripcion_servicio' => 'required|string|min:3|max:255',
            'precio' => 'required|integer'
        ];
    }
}
