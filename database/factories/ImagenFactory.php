<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Imagen>
 */
class ImagenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nombreArchivo = $this->faker->numberBetween(1,15) . '.jpg';
        return [
            // 'producto_id'=> $this->faker->numberBetween(1,30),
            'ruta'=> "imagenes-seed/{$nombreArchivo}",
        ];
    }
}
