<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Imagen;
use App\Models\Producto;
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
        User::factory(15)->create();

        User::factory()->create([
            'name' => 'Joshua',
            'email' => 'josh@hotmail.com',
            'password'=> bcrypt('hola1234'),
            'admin_desde'=> now(),
        ]);

        User::factory()->create([
            'name' => 'tester',
            'email' => 'test@hotmail.com',
            'password'=> bcrypt('password1234'),
        ]);

        Cliente::factory(9)->create();

        $categorias = Categoria::factory(7)->create();

        Producto::factory(30)
            ->create()
            ->each(function($producto) use ($categorias){
                $producto->categorias()->attach($categorias->random(2));
                // $producto->categorias()->attach($categorias->random(4, 7));

                $imagenes = Imagen::factory(mt_rand(3, 4))->make();
                $producto->imagenes()->saveMany($imagenes);

            });

    }
}
