<?php

namespace App\Http\Controllers;

use Socialite;
use App\Services\GoogleAccountService;
use JWTAuth;

class AuthGoogleController extends Controller
{
    public function redirect()
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
