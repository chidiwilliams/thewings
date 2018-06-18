<?php

namespace App\Http\Controllers;

use Socialite;
use App\Services\GoogleAccountService;
use JWTAuth;
use Cookie;
use Session;

class AuthGoogleController extends Controller
{
    public function redirect()
    {
        $request->session()->flush();
        if($request->session()->has('laravel_session')) {
            $request->session()->forget('laravel_session');
        }
        Session::flush();
        Session::forget('laravel_session');
        Cookie::queue(Cookie::forget('laravel_session'));

        return Socialite::driver('google')->redirect();
    }

    public function callback(GoogleAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('google')->user());
        auth()->login($user);

        return redirect()->to('/');
    }
}
