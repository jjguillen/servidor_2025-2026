<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        'id' => $this->id,
        'nombre' => $this->nombre,
        'descripcion' => $this->descripcion,
        'fecha' => $this->fecha.' '.$this->hora,
        'ciudad' => $this->ciudad,
        'direccion' => $this->direccion,
        'url_imagen' => asset($this->url_imagen),
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
    ];
    }
}
