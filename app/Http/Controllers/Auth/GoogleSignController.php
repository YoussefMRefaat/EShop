<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\SocialSignService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleSignController extends Controller
{
    /**
     * Authenticate the user by his Gmail
     *
     * @param SocialSignService $social
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(SocialSignService $social): \Illuminate\Http\RedirectResponse
    {
        $user = Socialite::driver('google')->user();
        $social->steer($user);
        return redirect(route('home'));
    }
}
