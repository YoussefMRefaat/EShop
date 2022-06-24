<?php

namespace App\Http\Controllers\Admin\Moderators;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Display all moderators
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $moderators = User::where('role' , 'moderator')->get();
        return view('admin.moderators.index' , compact('moderators'));
    }

    public function show(User $user): string
    {
        return "Page isn't ready yet. \n It should show two tables. One for moderator's log and the other for orders";
    }
}
