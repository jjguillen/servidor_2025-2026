<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->sentence(3),
            'descripcion' => $this->faker->text(),
            'fecha' => $this->faker->date(),
            'hora' => $this->faker->time(),
            'ciudad' => $this->faker->city(),
            'direccion' => $this->faker->address(),
            'url_imagen' => $this->faker->imageUrl(),
            'categoria_id' => $this->faker->numberBetween(1, 4),
            'aforo_maximo' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
