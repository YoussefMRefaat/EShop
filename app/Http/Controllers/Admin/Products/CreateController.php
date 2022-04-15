<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\ImageHandler;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    use ImageHandler;

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
        $data = $request->validated();
        $data['image'] = $this->saveImage($data['image'] , 'products');
        Product::create($data);
        return redirect(route('dashboard.products'))->with('success' , 'Product has been added successfully');
    }

}
