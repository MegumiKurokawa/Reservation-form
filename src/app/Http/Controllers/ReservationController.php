<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {

            $reservation = new Reservation();
            $reservation->user_id = Auth::user()->id;
            $reservation->restaurant_id = $request->input('restaurant_id');
            $reservation->reservation_date = $request->input('reservation_date');
            $reservation->reservation_time = $request->input('reservation_time');
            $reservation->people = $request->input('people');
            $reservation->save();

            return view('confirm');
        } else {

            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $updateReservation = Reservation::find($request->id);
        $updateReservation->update([
            'reservation_date' => $request->input('date'),
            'reservation_time' => $request->input('time'),
            'people' => $request->input('people'),
        ]);

        return redirect()->route('mypage')->with('message', '予約を更新しました');
    }

    public function destroy(Request $request)
    {
        $deleteReservation = Reservation::find($request->id);
        $deleteReservation->delete();

        return redirect()->route('mypage')->with('message', '予約をキャンセルしました');
    }
}
