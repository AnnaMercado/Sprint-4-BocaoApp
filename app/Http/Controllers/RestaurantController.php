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
            "link" => 'nullable',
            "open_days" => 'required|string',
        ]);

        $newRestaurant = Restaurant::create($data);
        return redirect(route('restaurants.index'));

    }





}
