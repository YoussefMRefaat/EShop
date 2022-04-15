<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ShowController extends Controller
{

    /**
     * Display all categories
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.categories.index' , compact('categories'));
    }

    /**
     * Display a specific category
     *
     * @param Category $category
     * @return \Illuminate\View\View
     */
    public function show(Category $category): \Illuminate\View\View
    {
        $category->load(['products' , 'children']);
        return view('admin.categories.show' , compact('category'));
    }

}
