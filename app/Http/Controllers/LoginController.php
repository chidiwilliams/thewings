<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Cookie;

class LoginController extends Controller
{
    public function clearCookies(Request $request)
    {
        $request->session()->flush();
        if($request->session()->has('laravel_session')) {
            $request->session()->forget('laravel_session');
        }
        Session::flush();
        Session::forget('laravel_session');
        Cookie::queue(Cookie::forget('laravel_session'));
        return redirect()->to('/auth/login');
    }

    public function login(Request $request)
    {
        $request->session()->flush();
        if($request->session()->has('laravel_session')) {
            $request->session()->forget('laravel_session');
        }
        Session::flush();
        Session::forget('laravel_session');
        Cookie::queue(Cookie::forget('laravel_session'));

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
