<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(){
        $restaurants= Restaurant::all();
        return view('restaurant.index', ['restaurants' => $restaurants]);
    }
    public function create(){
        return view('restaurant.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            "name" => 'required|string|max:255',
            "adress" => 'required|string',
            "open_days" => 'required|string',
        ]);

        $newRestaurant = Restaurant::create($data);
        return redirect(route('restaurants.index'));

    }

    public function edit(Restaurant $restaurant){
        return view('restaurant.edit', ['restaurant' => $restaurant]);

    }

    public function update(Restaurant $restaurant, Request $request){
        $data = $request->validate([
            "name" => 'required|string|max:255',
            "adress" => 'required|string',
            "open_days" => 'required|string',
        ]);
        $restaurant->update($data);
        return redirect(route('restaurants.index'))-> with('success', 'Restaurante modificado correctamente. ');


    }

    public function delete(Restaurant $restaurant){
        $restaurant->delete();
        return redirect(route('restaurants.index'))-> with('success', 'Restaurante eliminado correctamente. ');
    }





}
