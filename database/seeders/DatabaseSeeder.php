<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Admin_Seeder;
use Database\Seeders\Producto_Seeder;
use Database\Seeders\Mesa_Seeder;
use Database\Seeders\Tipo_ingrediente_seeder;
use Database\Seeders\Rol_seeder;
use Database\Seeders\Tipo_Producto_Seeder;
use Database\Seeders\Tipo_Gasto_Seeder;
use Database\Seeders\Tipo_Pago_Seeder;
use Database\Seeders\Medio_Pedido_Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            Rol_seeder::class,
            Tipo_Pago_Seeder::class,
            Tipo_Gasto_Seeder::class,
            Tipo_Producto_Seeder::class,
            Tipo_ingrediente_seeder::class,
            Mesa_Seeder::class,
            Producto_Seeder::class,
            Medio_Pedido_Seeder::class,
            Admin_Seeder::class,
        ]);
    }
}
