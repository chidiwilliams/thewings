<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\GoogleAccountService;
use JWTAuth;
use Cookie;
use Session;

class AuthGoogleController extends Controller
{
    public function redirect(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(GoogleAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('google')->user());
        auth()->login($user);

        return redirect()->to('/');
    }
}
