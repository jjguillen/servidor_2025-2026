<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Usuario 1',
            'email' => 'usuario1@example.com',
        ]);
        User::factory()->create([
            'name' => 'Usuario 2',
            'email' => 'usuario2@example.com',
        ]);
        User::factory()->create([
            'name' => 'Usuario 3',
            'email' => 'usuario3@example.com',
        ]);
    }
}
