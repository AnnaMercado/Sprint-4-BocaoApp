<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $restaurants = Restaurant::where('user_id', $userId)->paginate(7);
        return view('restaurant.index', ['restaurants' => $restaurants]);
    }

    public function show($id)
    {
        $restaurant = Restaurant::with('tags')->findOrFail($id);

        return view('restaurant.show', compact('restaurant'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('restaurant.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => 'required|string|max:255',
            "qualification" => 'required',
            "price_range" => 'required',
            "adress" => 'required|string',
            "open_days" => 'required|string',
            "tags" => 'array|nullable', 
            'tags.*' => 'exists:tags,id', 
        ]);

        if (Auth::check()) {
            $data['user_id'] = Auth::id();
        } else {
            return redirect()->route('login')->with('error', 'Debes estar autenticado para agregar un restaurante.');
        }

        $newRestaurant = Restaurant::create($data);

        if ($request->has('tags')) {
            $newRestaurant->tags()->attach($request->tags);
        }

        return redirect(route('restaurants.index'))->with('success', 'Restaurante creado correctamente.');
    }

    public function edit(Restaurant $restaurant)
    {
        $tags = Tag::all();
        return view('restaurant.edit', ['restaurant' => $restaurant],compact('tags'));
    }

    public function update(Restaurant $restaurant, Request $request)
    {
        $data = $request->validate([
            "name" => 'required|string|max:255',
            "qualification" => 'required',
            "price_range" => 'required',
            "adress" => 'required|string',
            "open_days" => 'required|string',
            "tags" => 'array|nullable', 
            'tags.*' => 'exists:tags,id', 
        ]);
    
        if (Auth::check()) {
            $data['user_id'] = Auth::id(); 
        } else {
            return redirect()->route('login')->with('error', 'Debes estar autenticado para editar un restaurante.');
        }
    
        $restaurant->update($data);
    
        if ($request->has('tags')) {
            $restaurant->tags()->sync($request->tags); 
        }
    
        return redirect(route('restaurants.index'))->with('success', 'Restaurante modificado correctamente.');
    }
    
    public function delete(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect(route('restaurants.index'))-> with('success', 'Restaurante eliminado correctamente. ');
    }
    public function dashboard()
    {
    $tags = Tag::all();  

    return view('dashboard', compact('tags'));
    }
    
    
    public function search(Request $request)
    {
        $query = Restaurant::where('user_id', Auth::id()); 
        $tags = Tag::all(); 
    
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
    
        if ($request->filled('qualification')) {
            $query->where('qualification', '>=', $request->input('qualification'));
        }
    
        if ($request->filled('price_range')) {
            $priceRange = $request->input('price_range');
    
            if ($priceRange == '€') {
                $query->where('price_range', '€');
            } elseif ($priceRange == '€€') {
                $query->where('price_range', '€€');
            } elseif ($priceRange == '€€€') {
                $query->where('price_range', '€€€');
            }
        }
    
        if ($request->filled('open_days')) {
            $query->where('open_days', 'like', '%' . $request->input('open_days') . '%');
        }
    
        if ($request->filled('tags')) {
            $query->whereHas('tags', function ($query) use ($request) {
                $query->whereIn('tags.id', $request->input('tags')); 
            });
        }
    
        $restaurants = $query->get();
        return view('dashboard', compact('restaurants', 'tags'));
    }

    public function discover(Request $request)
    {
        $query = Restaurant::query();

        if ($request->has('name') && $request->input('name') != '') {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('qualification') && $request->input('qualification') != '') {
            $query->where('qualification', '>=', $request->input('qualification'));
        }

        if ($request->has('open_days') && $request->input('open_days') != '') {
            $query->where('open_days', $request->input('open_days'));
        }

        if ($request->has('price_range') && $request->input('price_range') != '') {
            $query->where('price_range', $request->input('price_range'));
        }

        if ($request->has('tags') && !empty($request->input('tags'))) {
            $query->whereHas('tags', function ($query) use ($request) {
                $query->whereIn('tags.id', $request->input('tags'));
            });
        }

        $restaurants = $query->where('user_id', '!=', Auth::id())->get();

        $tags = Tag::all(); 

        return view('restaurant.discover', compact('restaurants', 'tags'));
    }

        

}
 