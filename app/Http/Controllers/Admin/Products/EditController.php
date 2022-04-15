<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\ImageHandler;
use Illuminate\Http\Request;

class EditController extends Controller
{
    use ImageHandler;

    /**
     * Display the edit product forms
     *
     * @param Product $product
     * @return \Illuminate\View\View
     */
    public function edit(Product $product): \Illuminate\View\View
    {
        $product->load('category:id,name');
        $categories = Category::where('id' , '!=' , $product->category_id)->get();
        return view('admin.products.edit' , compact('product' , 'categories'));
    }

    /**
     * Handle the update product request
     *
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductRequest $request , Product $product): \Illuminate\Http\RedirectResponse
    {
        $product->update($request->validated());
        return redirect(route('dashboard.products'))->with('success' , 'Product has been updated successfully');
    }

    /**
     * Handle the update of the product's image request
     *
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateImage(Request $request,Product $product): \Illuminate\Http\RedirectResponse
    {
        $request->validate(['image' => ['required' , 'image' , 'max:1024']]);
        $this->deleteImage($product->image);
        $image = $this->saveImage($request->file('image') , 'products');
        $product->update(['image' => $image]);
        return redirect(route('dashboard.products'))->with('success' , 'Product\'s image has been updated successfully');
    }

    /**
     * Handle the deleting product request
     *
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product): \Illuminate\Http\RedirectResponse
    {
        $this->deleteImage($product->image);
        $product->delete();
        return redirect(route('dashboard.products'))->with('success' , 'Product has been deleted successfully');
    }

}
