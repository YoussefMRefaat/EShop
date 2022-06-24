<?php

namespace App\Http\Controllers\Admin\Moderators;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreModeratorRequest;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CreateController extends Controller
{
    /**
     * Display the create moderator form
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        return view('admin.moderators.create');
    }

    /**
     * Handle the store moderator request
     *
     * @param StoreModeratorRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreModeratorRequest $request): \Illuminate\Http\RedirectResponse
    {
        $moderator = array_merge($request->validated() , ['role' => 'moderator']);
        $moderator['password'] = Hash::make($moderator['password']);
        $moderator = User::create($moderator);
        Cart::create(['user_id' => $moderator->id]);
        return redirect(route('dashboard.moderators'))
            ->with('success' , 'Moderator has been added successfully');
    }
}
