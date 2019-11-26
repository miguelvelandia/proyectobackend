<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Factura extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'total' => $this->total,
            'abono' => $this->abono,
            'saldo' => $this->saldo,
            'estado' => $this->estado,
            'orden_id' => $this->orden,
        ];
    }

}
