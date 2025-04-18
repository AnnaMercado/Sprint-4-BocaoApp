<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->get('/dashboard', [RestaurantController::class, 'dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/restaurantes', [RestaurantController::class, 'index']) ->name('restaurants.index');
    Route::get('/restaurantes/create', [RestaurantController::class, 'create']) ->name('restaurants.create');
    Route::post('/restaurantes', [RestaurantController::class, 'store']) ->name('restaurants.store');
    Route::get('/restaurantes/{restaurant}/edit', [RestaurantController::class, 'edit']) ->name('restaurants.edit');
    Route::put('/restaurantes/{restaurant}/update', [RestaurantController::class, 'update']) ->name('restaurants.update');
    Route::delete('/restaurantes/{restaurant}/delete', [RestaurantController::class, 'delete']) ->name('restaurants.delete');
    Route::get('/restaurants/search', [RestaurantController::class, 'search'])->name('restaurants.search');
    Route::get('/restaurants/discover', [RestaurantController::class, 'discover'])->name('restaurants.discover');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
