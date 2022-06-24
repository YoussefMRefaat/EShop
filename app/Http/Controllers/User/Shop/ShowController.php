<?php

namespace App\Http\Controllers\User\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowController extends Controller
{

    /**
     * Display the homepage
     *
     * @return \Illuminate\View\View
     */
    public function home(): \Illuminate\View\View
    {
        $products = Product::shop()->withCount('favourites' , 'orders')->get();
        $sliderProducts = $products->sortBy('favourites_count')->take(2);
        $trendyProducts = $products->sortBy('orders_count')->take(8);
        $categories = Category::has('products')->withCount('products')->take(3)->get();
        return view('user.home' , compact('sliderProducts' , 'categories'
            , 'products' , 'trendyProducts'));
    }

    /**
     * Display the shop page with an option of sorting results
     *
     * @param string $sort
     * @return \Illuminate\View\View
     */
    public function index(string $sort = 'id'): \Illuminate\View\View
    {
        $products = Product::shop()->orderBy($sort , 'desc')->paginate(9);
        $categories = $this->getCategories();
        return view('user.shop' , compact('products' , 'categories'));
    }

    /**
     * Display the shop page with only the products of a specific category
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function category(int $id): \Illuminate\View\View
    {
        $products = Product::shop()->where('category_id' , $id)->paginate(9);
        $categories = $this->getCategories();
        return view('user.shop' , compact('products' , 'categories'));
    }

    /**
     * Display the shop page with only the products of the filtered categories
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function filter(Request $request): \Illuminate\View\View
    {
        $request->validate(['categories' => ['required'] , 'categories.*' => ['integer' , 'exists:categories,id'] ]);
        $categories = $this->getCategories();
        $categoriesIDs = array_merge(
            Category::whereIn('parent_id' , $request->input('categories'))->pluck('id')->all()
            , $request->input('categories'));
        $products = Product::shop()
            ->whereIn('category_id' , $categoriesIDs)
            ->paginate(9);
        return view('user.shop' , compact('products' , 'categories'));
    }

    /**
     * Display the shop page with products that match the search
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request): \Illuminate\View\View
    {
        $request->validate(['product' => ['required' , 'string'] ]);
        $search = $request->input('product');
        $categories = $this->getCategories();
        $products = Product::shop()
            ->where('name' , 'like' , '%' . $search . '%')->paginate(9);
        return view('user.shop' , compact('products' , 'search' , 'categories'));
    }

    /**
     * Display the product details page
     *
     * @param Product $product
     * @return \Illuminate\View\View
     */
    public function show(Product $product): \Illuminate\View\View
    {
        $product->load('favourites');
        $products = Product::shop()->where('category_id' , $product->category_id)
            ->where('id' , '!=' , $product->id)->get();
        return view('user.details' , compact('product' , 'products'));
    }

    private function getCategories(){
        return Category::withCount('products')->get();
    }
}
