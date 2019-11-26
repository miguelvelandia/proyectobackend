<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacturaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'total' => 'required|integer',
            'abono' => 'required|integer',
            'saldo' => 'required|integer|min:3',
            'estado' => 'required|integer',
            'orden_id' => 'required|integer',
            'empleadoorden_id' => 'required|integer',
            'valor' => 'required|integer|min:3',
        ];
    }
}
