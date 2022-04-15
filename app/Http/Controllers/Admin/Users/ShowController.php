<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\TotalPriceCalculator;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    use TotalPriceCalculator;

    /**
     * Display all users
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $users = User::where('is_admin' , 0)->get();
        return view('admin.users.index' , compact('users'));
    }

    /**
     * Display a user and his orders
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function show(User $user): \Illuminate\View\View
    {
        $user->load('orders');
        $this->calculateEveryTotalPrice($user->orders);
        return view('admin.users.show' , compact('user'));
    }

}
