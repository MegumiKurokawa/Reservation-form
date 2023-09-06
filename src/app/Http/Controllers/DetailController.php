<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Reservation;

class DetailController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        $areas = Restaurant::distinct('area')->pluck('area');
        $genres = Restaurant::distinct('genre')->pluck('genre');

        return view('index', compact('restaurants', 'areas', 'genres'));
    }

    public function show($restaurant_id)
    {
        $restaurant = Restaurant::find($restaurant_id);
        $reservations = Reservation::where('restaurant_id', $restaurant_id)->get();

        return view('detail', compact('restaurant', 'reservations'));
    }

    public function search(Request $request)
    {
        $query = Restaurant::query();

        $search_area = $request->input('area');
        $search_genre = $request->input('genre');
        $keyword = $request->input('keyword');

        if (!empty($search_area)) {
            $query->where('area', 'LIKE', $search_area);
        }

        if (!empty($search_genre)) {
            $query->where('genre', 'LIKE', $search_genre);
        }

        if ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }

        $restaurants = $query->get();

        $areas = Restaurant::distinct('area')->pluck('area');
        $genres = Restaurant::distinct('genre')->pluck('genre');



        return view('index', compact('restaurants', 'areas', 'genres'));
    }
}
