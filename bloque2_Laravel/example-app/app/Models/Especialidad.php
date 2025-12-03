<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Especialidad extends Model
{
    protected $table = 'especialidades';


    public function tecnicos(): BelongsToMany {
        return $this->belongsToMany(Tecnico::class);
    }

}
