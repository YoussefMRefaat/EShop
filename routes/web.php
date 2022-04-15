<?php

//validate status

use Illuminate\Support\Facades\Route;

Route::pattern('sort' , 'created_at|price');
Route::pattern('id' , '\d+');
Route::pattern('product' , '\d+');
Route::pattern('category' , '\d+');
Route::pattern('order' , '\d+');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\User\Shop\ShowController::class , 'home'])->name('home');
Route::get('/shop/{sort?}' , [\App\Http\Controllers\User\Shop\ShowController::class , 'index'])->name('shop');
Route::get('/shop/{id}' , [\App\Http\Controllers\User\Shop\ShowController::class , 'category'])->name('shop.category');
Route::get('/shop/search' , [\App\Http\Controllers\User\Shop\ShowController::class , 'search'])->name('shop.search');
Route::get('/shop/filter' , [\App\Http\Controllers\User\Shop\ShowController::class , 'filter'])->name('shop.filter');
Route::get('/details/{product}' , [\App\Http\Controllers\User\Shop\ShowController::class , 'show'])->name('details');

require __DIR__.'/auth.php';

Route::group([
    'middleware' => ['auth']
],function(){
    Route::get('likes' , [\App\Http\Controllers\User\Favourites\ShowController::class , 'index'])
        ->name('favourites');
    Route::post('/likes/{product}' , [\App\Http\Controllers\User\Favourites\CreateController::class , 'store']);
    Route::get('/cart' , [\App\Http\Controllers\User\Cart\ShowController::class , 'index'])->name('cart');
    Route::post('/cart' , [\App\Http\Controllers\User\Cart\CreateController::class , 'store']);
    Route::patch('/cart' , [\App\Http\Controllers\User\Cart\EditController::class , 'update']);
    Route::delete('/cart' , [\App\Http\Controllers\User\Cart\EditController::class , 'destroy']);

    Route::get('checkout' , [\App\Http\Controllers\User\Order\CreateController::class , 'create'])
        ->name('checkout');
    Route::post('checkout' , [\App\Http\Controllers\User\Order\CreateController::class , 'store'])
        ->middleware(['billing.data' , 'cart.empty' , 'banned']);
});

Route::group([
    'middleware' => [ 'auth' , 'admin'],
    'prefix' => 'dashboard',
] , function(){
    Route::get('/'  , [\App\Http\Controllers\Admin\DashboardController::class , 'index'])
        ->name('dashboard');

    Route::group([
        'prefix' => '/products',
    ],function(){
        Route::get('/' , [\App\Http\Controllers\Admin\Products\ShowController::class , 'index'])
            ->name('dashboard.products');
        Route::get('/search' , [\App\Http\Controllers\Admin\Products\ShowController::class , 'search'])
            ->name('dashboard.products.search');

        Route::get('/create' , [\App\Http\Controllers\Admin\Products\CreateController::class , 'create'])
            ->name('dashboard.products.create');
        Route::post('/' , [\App\Http\Controllers\Admin\Products\CreateController::class , 'store']);

        Route::get('/{product}' , [\App\Http\Controllers\Admin\Products\EditController::class , 'edit'])
            ->name('dashboard.products.edit');
        Route::patch('/{product}' , [\App\Http\Controllers\Admin\Products\EditController::class , 'update']);
        Route::patch('/{product}/image' , [\App\Http\Controllers\Admin\Products\EditController::class , 'updateImage'])
        ->name('dashboard.products.edit-image');
        Route::delete('/{product}' , [\App\Http\Controllers\Admin\Products\EditController::class , 'destroy']);
    });

    Route::group([
        'prefix' => '/categories',
    ],function(){
        Route::get('/' , [\App\Http\Controllers\Admin\Categories\ShowController::class , 'index'])
            ->name('dashboard.categories');
        Route::get('/create' , [\App\Http\Controllers\Admin\Categories\CreateController::class , 'create'])
            ->name('dashboard.categories.create');
        Route::get('/{category}' , [\App\Http\Controllers\Admin\Categories\ShowController::class , 'show'])
            ->name('dashboard.categories.show');
        Route::post('/' , [\App\Http\Controllers\Admin\Categories\CreateController::class , 'store']);

        Route::get('/{category}/edit' , [\App\Http\Controllers\Admin\Categories\EditController::class , 'edit'])
            ->name('dashboard.categories.edit');
        Route::patch('/{category}' , [\App\Http\Controllers\Admin\Categories\EditController::class , 'update']);

        Route::delete('/{category}' , [\App\Http\Controllers\Admin\Categories\EditController::class , 'destroy']);
    });

    Route::group([
        'prefix' => '/orders',
    ],function(){
        Route::get('/{status?}' , [\App\Http\Controllers\Admin\Orders\ShowController::class , 'index'])
            ->name('dashboard.orders');
        Route::get('/{order}' , [\App\Http\Controllers\Admin\Orders\ShowController::class , 'show'])
            ->name('dashboard.orders.show');
        Route::patch('/{order}/ship' , [\App\Http\Controllers\Admin\Orders\EditController::class , 'ship'])
            ->name('dashboard.orders.ship')->middleware('order.status:pending');
        Route::patch('/{order}/deliver' , [\App\Http\Controllers\Admin\Orders\EditController::class , 'deliver'])
            ->name('dashboard.orders.deliver')->middleware('order.status:shipped');
        Route::patch('/{order}/cancel' , [\App\Http\Controllers\Admin\Orders\EditController::class , 'cancel'])
            ->name('dashboard.orders.cancel')->middleware(['order.status:pending,shipped,delivered' , 'restorable']);
        Route::patch('/{order}/restore' , [\App\Http\Controllers\Admin\Orders\EditController::class , 'restore'])
            ->name('dashboard.orders.restore')->middleware('order.status:cancelled');
    });

    Route::group([
        'prefix' => '/users'
    ] , function(){
        Route::get('/' , [\App\Http\Controllers\Admin\Users\ShowController::class , 'index'])
            ->name('dashboard.users');
        Route::get('/{user}' , [\App\Http\Controllers\Admin\Users\ShowController::class , 'show'])
            ->name('dashboard.users.show')->middleware('admin.modification');
        Route::patch('/{user}' , [\App\Http\Controllers\Admin\Users\EditController::class , 'ban'])
            ->middleware('admin.modification');
    });
});
