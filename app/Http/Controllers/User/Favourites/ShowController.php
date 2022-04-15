<?php

namespace App\Http\Controllers\User\Favourites;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowController extends Controller
{

    /**
     * Display the likes page
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $products = auth()->user()->favourites()->paginate(6);
        return view('user.favourites' , compact('products'));
    }

}
