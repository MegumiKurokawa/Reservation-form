<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
    {        
        $user_id = Auth::user()->id;
        
        $reservations = Reservation::with('restaurant')->where('user_id', $user_id)->get();
        $favorites = Favorite::where('user_id', $user_id)->with('restaurant')->get();

        return view('mypage', compact('reservations', 'favorites'));
    }
}
