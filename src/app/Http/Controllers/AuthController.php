<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        $user = Auth::user();

        return view('mypage', compact('user'));
    }
}
