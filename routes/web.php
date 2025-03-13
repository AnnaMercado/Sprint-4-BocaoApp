<?php

use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/restaurantes', [RestaurantController::class, 'index']) ->name('restaurants.index');
