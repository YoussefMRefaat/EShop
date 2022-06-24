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
        return view('admin.products.index' , compact('products'));
    }

    /**
     * Search for products
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request): \Illuminate\View\View
    {
        $searchFor = $request->validate(['search' => ['string' , 'required']])['search'];
        $products = Product::with('category')->withCount(['favourites' , 'orders'])
            ->where('name' , 'like' , '%' . $searchFor . '%')->get();
        return view('admin.products.index' , compact('products' , 'searchFor'));
    }

}
