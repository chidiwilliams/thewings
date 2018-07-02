<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        // if (Auth::check()) {
        //     return redirect()->to('/nominate');
        // }
        // return redirect()->to('/login');
        return redirect()->to('/done');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}
