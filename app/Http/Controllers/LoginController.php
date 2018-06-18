<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Cookie;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->to('/');
        }
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
