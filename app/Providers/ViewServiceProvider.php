<?php

namespace App\Providers;

use App\View\Composers\UserCategoriesComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any view services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any view services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['components.user.sidebar' , 'components.user.footbar'] , UserCategoriesComposer::class);
    }
}
