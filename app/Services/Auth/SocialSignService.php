<?php

namespace App\Services\Auth;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialSignService{

    /**
     * Steer the user to login or register
     *
     * @param \Laravel\Socialite\Contracts\User $socialUser
     * @return void
     */
    public function steer(\Laravel\Socialite\Contracts\User $socialUser){
        $user = $this->exists($socialUser->getEmail());
        if(!$user)
            $user = $this->register($socialUser);
        session()->put('cartId' , $user->cart()->first()->id);
        $this->login($user);
    }

    /**
     * Check if the user exists in the DB
     *
     * @param string $email
     * @return User|null
     */
    private function exists(string $email): User|null
    {
        return User::where('email' , $email)->first();
    }

    /**
     * Login the user based on his email
     *
     * @param User $user
     * @return void
     */
    private function login(User $user){
        Auth::login($user);
    }

    /**
     * Create a new user
     *
     * @param \Laravel\Socialite\Contracts\User $socialUser
     * @return User
     */
    private function register(\Laravel\Socialite\Contracts\User $socialUser): User
    {
        $user =  User::create([
            'name' => $socialUser->getName(),
            'email' => $socialUser->getEmail(),
        ]);
        Cart::create(['user_id' => $user->id]);
        return $user;
    }

}
