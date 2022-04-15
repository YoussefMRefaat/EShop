<?php

namespace App\View\Composers;

use App\Models\Category;
use \Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class UserCategoriesComposer{

    /**
     * Get all categories
     *
     * @var Collection
     */
    protected Collection $categories;

    public function __construct(){
        $this->categories = $this->getCategories();
    }

    public function compose(View $view){
        $view->with('categories' , $this->categories);
    }

    private function getCategories(): Collection
    {
        return Category::whereNull('parent_id')->with('children')->get();
    }
}
