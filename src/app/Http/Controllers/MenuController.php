<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menu()
    {
        if (Auth::check()) {

            return view('usermenu');
        } else {
            return view('guestmenu');
        }

        
    }

    public function back(Request $request)
    {
        $fromDetailPage = $request->input('from_detailpage');
        $fromMyPage = $request->input('from_mypage');
        $fromIndexPage = $request->input('from_indexpage');

        if ($fromDetailPage || $fromMyPage || $fromIndexPage) {
            return back()->withInput();
        } else {
            return redirect('/');
        }
    }    
}
