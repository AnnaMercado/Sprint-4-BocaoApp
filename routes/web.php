<?php

use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/restaurantes', [RestaurantController::class, 'index']) ->name('restaurants.index');
Route::get('/restaurantes/create', [RestaurantController::class, 'create']) ->name('restaurants.create');
Route::post('/restaurantes', [RestaurantController::class, 'store']) ->name('restaurants.store');
Route::get('/restaurantes/{restaurant}/edit', [RestaurantController::class, 'edit']) ->name('restaurants.edit');
Route::put('/restaurantes/{restaurant}/update', [RestaurantController::class, 'update']) ->name('restaurants.update');


