<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class FavoriteController extends Controller
{
   public function store(Request $request)
   {
           $favorite = new Favorite;
           $favorite->restaurant_id = $request->restaurant_id;
           $favorite->user_id = Auth::user()->id;
           $favorite->save();
                        
            return back();
    }

    public function delete(Request $request)
    {
        $user = Auth::user();

        $restaurantId = $request->input('restaurant_id');

        $favorite = Favorite::where('user_id', $user->id)->where('restaurant_id', $restaurantId)->first();

        if ($favorite) {
            $favorite->delete();

            return back();
        }
    }
}
