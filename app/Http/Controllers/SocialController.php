<?php

namespace App\Http\Controllers;

use App\SocialAccount;
use App\User;
use Laravel\Socialite\Facades\Socialite;


class SocialController extends Controller
{
    public function redirect($network)
    {
        return Socialite::driver($network)->redirect();
    }

    public function callback($network)
    {
        $user = $this->createOrGetUser(\Socialite::driver($network));

        if (!$user){
            return redirect()->to('/rs/pocetna')->with('socialStatus', 'Nepostojeci korisnik, registracija neophodna.');
        }

        auth()->login($user);

        return redirect()->to('/rs/pocetna');
    }

    private function createOrGetUser($provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        }
        else {
            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                return false;
            }

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName,
                'user_id' => $user->id
            ]);

            $account->save();

            return $user;
        }
    }

    public function errorPage($lang)
    {
        return view('errors.404');
    }
}