<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{

    /**
     * Ban or unban a user
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function ban(User $user): \Illuminate\Http\RedirectResponse
    {
        if($user->is_banned){
            $message = 'unbanned';
            $user->update(['is_banned' => 0]);
        }else{
            $message = 'banned';
            $user->update(['is_banned' => 1]);
        }
        return redirect(route('dashboard.users'))->with('success' , "User has been $message successfully");
    }

}
