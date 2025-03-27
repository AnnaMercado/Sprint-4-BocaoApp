<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Sembrar la base de datos.
     *
     * @return void
     */
    public function run(): void
    {

        // Crear el primer usuario
        User::factory()->create([
            'name' => 'Anna',
            'email' => 'test@example.com',
            'password' => Hash::make('annamercado'),
        ]);

        // Crear el segundo usuario
        User::factory()->create([
            'name' => 'Jordi',
            'email' => 'jordi@example.com',
            'password' => Hash::make('jordimontell'),
        ]);

        // Crear el tercer usuario
        User::factory()->create([
            'name' => 'Maria',
            'email' => 'maria@example.com',
            'password' => Hash::make('mariapozo'),
        ]);
        $this->call(TagSeeder::class);
        $this->call(RestaurantSeeder::class);
    }
}
