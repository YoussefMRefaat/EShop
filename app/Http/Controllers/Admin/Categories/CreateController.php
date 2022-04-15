<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CreateController extends Controller
{

    /**
     * Display the create category form
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.categories.create' , compact('categories'));
    }

    /**
     * Handle the store new category request
     *
     * @param StoreCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        Category::create($request->validated());
        return redirect(route('dashboard.categories'))->with('success' , 'Category has been added successfully');
    }

}
