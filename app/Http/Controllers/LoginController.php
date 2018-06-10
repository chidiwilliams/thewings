<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cookie;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::check()) {
            return redirect()->to('/');
        }
        $request->session()->flush();
        Cookie::queue(Cookie::forget('laravel_session'));
        return view('login');
    }

    public function home(Request $request)
    {
        if (Auth::check()) {
            return redirect()->to('/nominate');
        }
        return redirect()->to('/login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}
