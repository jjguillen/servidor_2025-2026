<?php

namespace Database\Seeders;

use App\Models\Tecnico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecialidadTecnicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tecnico = Tecnico::find(1);
        $tecnico->especialidades()->attach([1, 2]);

        $tecnico = Tecnico::find(2);
        $tecnico->especialidades()->attach([3, 4]);
    }
}
