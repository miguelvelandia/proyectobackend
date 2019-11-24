<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'nombres' => 'required|min:3|max:255|string|unique:clientes,nombres,'.$this->cliente,
            'direccion' => 'required|min:3|max:255',
            'telefono' => 'required|min:3|max:20|unique:clientes,telefono,'.$this->cliente,
            'email' => 'required|email',
            'especial' => 'required|integer|min:1'
        ];
    }
}
