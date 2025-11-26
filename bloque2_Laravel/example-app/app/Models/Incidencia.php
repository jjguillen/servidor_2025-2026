<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Incidencia extends Model
{
    /** @use HasFactory<\Database\Factories\IncidenciaFactory> */
    use HasFactory;

    protected $fillable = ["latitud", "longitud", "ciudad", "direccion", "descripcion", "estado"];

    /**
     * Devuelve el tecnico de una incidencia
     * @return BelongsTo
     */
    public function tecnico(): BelongsTo {
        return $this->belongsTo(Tecnico::class);
    }

}
