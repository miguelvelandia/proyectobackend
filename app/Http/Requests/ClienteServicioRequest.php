<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteServicioRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'cliente_id' => 'required|integer',
            'servicio_id' => 'required|integer',
            'precio' => 'required|integer|min:3'
        ];
    }
}
