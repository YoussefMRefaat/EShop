<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowController extends Controller
{

    /**
     * Display all products
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $products = Product::with('category')->withCount(['favourites' , 'orders'])->get();
        return view('admin.products.index' , ['products' => $products]);
    }

    /**
     * Search for products
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request): \Illuminate\View\View
    {
        $validated = $request->validate(['search' => ['string' , 'required']]);
        $products = Product::with('category')->withCount(['favourites' , 'orders'])
            ->where('name' , 'like' , '%' . $validated['search'] . '%')->get();
        return view('admin.products.index' , ['products' => $products , 'searchFor' => $validated['search']]);
    }

}
