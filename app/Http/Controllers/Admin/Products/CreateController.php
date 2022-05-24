<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;

class CreateController extends Controller
{
    /**
     * Display the create product form
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $categories = Category::select('id' , 'name')->get();
        return view('admin.products.create' , ['categories' => $categories]);
    }

    /**
     * Handle the store product request
     *
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductRequest $request): \Illuminate\Http\RedirectResponse
    {
        // image is stored in the storage by the observer
        Product::create($request->validated());
        return redirect(route('dashboard.products'))->with('success' , 'Product has been added successfully');
    }

}
