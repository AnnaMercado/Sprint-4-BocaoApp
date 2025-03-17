<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantTagSeeder extends Seeder
{
    public function run()
    {
        DB::table('tags')->insert([
            ['name' => 'Vegetariano'],
            ['name' => 'Vegano'],
            ['name' => 'Mariscos'],
            ['name' => 'Carnes'],
            ['name' => 'Comida Rápida'],
            ['name' => 'Gourmet'],
            ['name' => 'Romántico'],
            ['name' => 'Familia'],
            ['name' => 'Sin Gluten'],
            ['name' => 'Cocina Asiática'],
            ['name' => 'Cocina Mediterránea'],
            ['name' => 'Brunch'],
            ['name' => 'Desayunos'],
            ['name' => 'Bar'],
            ['name' => 'Comida para Llevar'],
            ['name' => 'Terraza'],
            ['name' => 'Pet Friendly'],
            ['name' => 'Con Vistas'],
            ['name' => 'Bistró'],
            ['name' => 'Fusión'],
            ['name' => 'Económico'],
            ['name' => 'De Lujo'],
            ['name' => 'Cocina Local'],
        ]);
    }
}
