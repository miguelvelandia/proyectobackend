<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClienteServicio extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'cliente_id' => $this->cliente,
            'servicio_id' => $this->servicio,
            'precio' => $this->precio,
        ];
    }
}
