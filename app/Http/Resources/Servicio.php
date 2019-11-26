<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Servicio extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'descripcion' => $this->descripcion,
            'categoria_id' => $this->categoria,
        ];
    }
    
}
