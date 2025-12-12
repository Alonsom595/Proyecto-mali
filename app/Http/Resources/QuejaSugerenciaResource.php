<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuejaSugerenciaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'periodo' => $this->periodo,
            'no_de_control' => $this->no_de_control,
            'mensaje' => $this->mensaje,
            'fecha' => $this->fecha?->format('Y-m-d'),
            'no' => $this->no,
            'titulo' => $this->titulo,
            'clave_area' => $this->clave_area,
            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),
        ];
    }
}