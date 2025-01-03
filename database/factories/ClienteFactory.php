<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->unique()->randomDigitNotNull(),
            'nombre_apellidos' => $this->faker->sentence(2),
            'direccion' => $this->faker->sentence(3),
            'direccion_facturacion' => $this->faker->sentence(3),
        ];
    }
}
