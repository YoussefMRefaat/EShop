<?php

namespace App\Http\Controllers\Admin\Moderators;

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
        return redirect(route('dashboard.moderators'))
            ->with('success' , "Moderator has been $message successfully");
    }

    /**
     * Handle the deleting product request
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        $user->delete();
        return redirect(route('dashboard.moderators'))
            ->with('success' , 'Moderator has been deleted successfully');
    }
}
