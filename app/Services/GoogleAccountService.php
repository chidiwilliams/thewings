<?php

namespace App\Services;
use App\GoogleAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class GoogleAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = GoogleAccount::whereProvider('google')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new GoogleAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'google'
            ]);

            $user = User::create([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
                'password' => md5(rand(1,10000)),
            ]);

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}