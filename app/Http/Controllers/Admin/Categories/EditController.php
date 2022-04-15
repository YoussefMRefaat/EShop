<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class EditController extends Controller
{

    /**
     * Display the edit category form
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit(int $id): \Illuminate\View\View
    {
        $category = Category::with('parent')->findOrFail($id);
        $categories = Category::whereNotIn('id' , [$id , $category->parent_id ?? $id])
            ->whereNull('parent_id')->get();
        return view('admin.categories.edit' , compact('category' , 'categories'));
    }

    /**
     * Handle the update category request
     *
     * @param StoreCategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreCategoryRequest $request ,Category $category): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $data['parent_id'] = $request['parent_id'] ?? null;
        $category->update($data);
        return redirect(route('dashboard.categories'))->with('success' , 'Category has been updated successfully');
    }

    /**
     * Handle the deleting category request
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category): \Illuminate\Http\RedirectResponse
    {
        $category->delete();
        return redirect(route('dashboard.categories'))->with('success' , 'Category has been deleted successfully');
    }

}
