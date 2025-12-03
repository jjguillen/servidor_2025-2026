<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tecnico extends Model
{
    /** @use HasFactory<\Database\Factories\TecnicoFactory> */
    use HasFactory;

    protected $fillable = ["latitud", "longitud", "nombre", "apellidos", "telefono", "email", "tecnico_id"];

    /**
     * Devuelve las incidencias de un tecnico
     * @return HasMany
     */
    public function incidencias(): HasMany {
        return $this->hasMany(Incidencia::class);
    }

    public function especialidades(): BelongsToMany {
        return $this->belongsToMany(Especialidad::class);
    }


}
