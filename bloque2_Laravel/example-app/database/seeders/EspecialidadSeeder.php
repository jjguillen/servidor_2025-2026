<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('especialidades')->insert(['nombre' => 'Fontanería']);
        DB::table('especialidades')->insert(['nombre' => 'Albañilería']);
        DB::table('especialidades')->insert(['nombre' => 'Carpintería']);
        DB::table('especialidades')->insert(['nombre' => 'Electricidad']);
    }
}
