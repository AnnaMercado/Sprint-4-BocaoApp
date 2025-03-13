<?php

use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/restaurantes', [RestaurantController::class, 'index']) ->name('restaurants.index');
Route::get('/restaurantes/create', [RestaurantController::class, 'create']) ->name('restaurants.create');
Route::post('/restaurantes', [RestaurantController::class, 'store']) ->name('restaurants.store');

