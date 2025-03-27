<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;  // Importa el modelo de Restaurant
use App\Models\Tag;        // Importa el modelo de Tag
use App\Models\User;

class RestaurantSeeder extends Seeder
{
    public function run()
    {
        // Lista de restaurantes con información
        $restaurants = [
            ['name' => 'El Celler de Can Roca', 'qualification' => 10, 'price_range' => '€€€', 'adress' => 'Carrer de Can Roca, 10, 08017 Barcelona', 'open_days' => 'Lunes a Domingo'],
            ['name' => 'Tickets', 'qualification' => 9, 'price_range' => '€€€', 'adress' => 'Avinguda del Paral·lel, 164, 08015 Barcelona', 'open_days' => 'Lunes a Sábado'],
            ['name' => 'Lasarte', 'qualification' => 10, 'price_range' => '€€€', 'adress' => 'Carrer de Pau Claris, 152, 08009 Barcelona', 'open_days' => 'Martes a Domingo'],
            ['name' => 'Cal Pep', 'qualification' => 8, 'price_range' => '€€', 'adress' => 'Plaça de les Olles, 8, 08003 Barcelona', 'open_days' => 'Lunes a Domingo'],
            ['name' => 'Ramen-ya Hiro', 'qualification' => 7, 'price_range' => '€', 'adress' => 'Carrer de Pau Claris, 129, 08009 Barcelona', 'open_days' => 'Lunes a Domingo'],
            ['name' => 'Quimet & Quimet', 'qualification' => 8, 'price_range' => '€€', 'adress' => 'Carrer del Poeta Cabanyes, 25, 08004 Barcelona', 'open_days' => 'Martes a Domingo'],
            ['name' => 'Bar Mut', 'qualification' => 9, 'price_range' => '€€€', 'adress' => 'Carrer del Pau Claris, 192, 08037 Barcelona', 'open_days' => 'Lunes a Domingo'],
            ['name' => 'Can Majó', 'qualification' => 8, 'price_range' => '€', 'adress' => 'Carrer de l’Almirall Aixada, 23, 08003 Barcelona', 'open_days' => 'Lunes a Domingo'],
            ['name' => 'Casa Mono', 'qualification' => 7, 'price_range' => '€', 'adress' => 'Carrer de Pau Claris, 158, 08009 Barcelona', 'open_days' => 'Lunes a Domingo'],
            ['name' => 'El Xampanyet', 'qualification' => 9, 'price_range' => '€€€', 'adress' => 'Carrer de Montcada, 22, 08003 Barcelona', 'open_days' => 'Martes a Domingo'],
        ];

    
        foreach ($restaurants as $restaurantData) {

            $restaurant = Restaurant::create([
                'name' => $restaurantData['name'],
                'qualification' => $restaurantData['qualification'],
                'price_range' => $restaurantData['price_range'],
                'adress' => $restaurantData['adress'],
                'open_days' => $restaurantData['open_days'],
                'user_id' => User::inRandomOrder()->first()->id,
            ]);

            // Asociar aleatoriamente los tags existentes al restaurante
            $tags = Tag::inRandomOrder()->take(rand(1, 5))->pluck('id');  // Tomar entre 1 y 5 tags aleatorios
            $restaurant->tags()->attach($tags); // Crear la relación muchos a muchos
        }
    }
}
